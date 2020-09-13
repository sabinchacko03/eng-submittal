<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inspections extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Inspections_model');
        $this->load->model('Milestone_model');
    }

    public function index() {
//        $data['inspections'] = $this->Inspections_model->getAllInspections();
        $res = $this->Inspections_model->getInspectionSummary();
        $summary = $res->result_array();
        foreach ($summary as $key => $row) {
            $status = $this->Inspections_model->getInspectionSummaryProject($row['project']);
            $summary[$key] = array_merge($summary[$key], $status);
        }
        $data['summary'] = $summary;
        $this->load->view('inspections/index', $data);
        $this->load->view('layout/footer');
    }

    public function AJAXgetInspectionForm() {
        $data['projects'] = $this->Admin_model->getCurrentProjects();
        $data['milestones'] = $this->Milestone_model->getMilestones();
        $data['inspection_master'] = $this->Inspections_model->getAllInspectionMaster();
        echo($this->load->view('inspections/add_inspection', $data, TRUE));
    }

    public function AJAXgetInspectionMasterForm() {
        $data = array();
        echo($this->load->view('inspections/add_master_box', $data, TRUE));
    }

    public function AJAXaddMaster() {
        $data['lastMaster'] = $this->Inspections_model->insertInspectionMaster();
        $data['inspection_master'] = $this->Inspections_model->getAllInspectionMaster();
        echo($this->load->view('inspections/master_select_box_options', $data, TRUE));
    }

    public function AJAXAddInspection() {
        $project = $this->input->post('project');
        $res = $this->Inspections_model->insertInspection();
        $data['inspections'] = $this->Inspections_model->getAllInspections($project);
        echo($this->load->view('inspections/inspection_summary_ajax', $data, TRUE));
    }

    public function AJAXgetProjectMilestones() {
        $project = $this->input->post('project');
        $data['milestones'] = $this->Milestone_model->getMilestones($project);
        echo($this->load->view('inspections/project_milestones_select_box_options', $data, TRUE));
    }

    public function AJAXgetMilestonePlannedDate() {
        $milestone = $this->input->post('milestone');
        $result = $this->Milestone_model->getMilestonByID($milestone);
        foreach ($result->result() as $row) {
            $planned_date = ($row->amended_date != '0000-00-00') ? $row->amended_date : $row->planned_date;
        }
        echo $planned_date;
    }

    public function AJAXInspectionHistoryForm() {
        $inspection = $this->input->post('inspection');
        $data['inspectionDetails'] = $this->Inspections_model->getInspectionByID($inspection);
        $data['history'] = $this->Inspections_model->getAllInspectionHistory($inspection);
        $data['status'] = $this->Inspections_model->getInspectionStatus();
        echo($this->load->view('inspections/enter_inspection', $data, TRUE));
    }

    public function AJAXaddInspectionHistory() {
        $project = $this->input->post('project');
        $res = $this->Inspections_model->insertInspectionHistory();
        $data['inspections'] = $this->Inspections_model->getAllInspections($project);
        echo($this->load->view('inspections/inspection_summary_ajax', $data, TRUE));
    }

    public function AJAXGetInspectionHistory() {
        $inspection = $this->input->post('id');
        $data['history'] = $this->Inspections_model->getInspectionHistory($inspection);
        echo($this->load->view('inspections/inspection_history', $data, TRUE));
    }

    public function add_master() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[inspection_master.name]', array('is_unique' => 'Inspection Type already exists'));
        if ($this->form_validation->run()) {
            $this->Inspections_model->insertInspectionMaster();
            $this->session->set_flashdata('msg', 'Master Added...');
        }
        $this->load->view('inspections/add_master');
        $this->load->view('layout/footer');
    }

    public function AJAXgetInspectionProject() {
        $project = $this->input->post('project');
        $data['inspections'] = $this->Inspections_model->getAllInspections($project);
        echo($this->load->view('inspections/inspection_summary_ajax', $data, TRUE));
    }

    public function AJAXgetInspectionSummary() {
        $res = $this->Inspections_model->getInspectionSummary();
        $summary = $res->result_array();
        foreach ($summary as $key => $row) {
            $status = $this->Inspections_model->getInspectionSummaryProject($row['project']);
            $summary[$key] = array_merge($summary[$key], $status);
        }
        $data['summary'] = $summary;
        echo($this->load->view('inspections/overall_inspection_summary_ajax', $data, TRUE));
    }

    public function AJAXvalidateInspection() {
        $result['result'] = 'true';
        $result['msg'] = '';
        if (!$this->Inspections_model->checkInspectionExist()) {
            $result['result'] = 'false';
            $result['msg'] = 'Inspection already exists!';
        }
        echo json_encode($result);
    }
    
    public function AJAXgetInpectionDateLimits(){
        $project = $this->input->post('project');
        $inspection = $this->input->post('inspection');
        
        $history = $this->Inspections_model->getInspectionHistory($inspection);
        $projectDet = $this->Admin_model->getProjectDetails($project);
        $result['min_date'] = date('Y-m-d');
        foreach($projectDet->result() as $row){
            if($history->num_rows() > 0){
//                $result['min_date'] =  $this->Inspections_model->getLastInspectionDate($inspection);
                $result['min_date'] = $row->start_date;
            }else{
                $result['min_date'] = $row->start_date;
            }
            $result['max_date'] = $row->end_date;
        }
        echo json_encode($result);
    }

}
