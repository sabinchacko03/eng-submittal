<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Milestone extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Milestone_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_name', 'Project Name', 'required', 'Please enter Username');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required', 'Please enter password');
        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['milestone_master'] = $this->Milestone_model->getAllMilestonesMaster();
        $data['milestones'] = $this->Milestone_model->getMilestonesByProjectGroup();
        $data['allMilestones'] = $this->Milestone_model->getMilestones();
        $data['project_milestones'] = array();
        foreach ($data['milestones']->result() as $row) {
            $milestoneByProject = $this->Milestone_model->getMilestones($row->project);
            $temp = $this->getMilestoneReport($milestoneByProject->result());
            $temp['project_name'] = $row->project_name;
            $temp['project_id'] = $row->project_id;
            $temp['project'] = $row->project;
            $temp['project_status'] = $row->project_status;
            $data['project_milestones'][] = $temp;
        }
        $this->load->view('milestone/index', $data);
        $this->load->view('layout/footer');
    }

// Function to return project details to Ajax call
    public function AJAXgetMilestoneProject() {
        $project = $this->input->post('project');
        $data['project'] = $project;
        $projectDet = $this->Admin_model->getProjectDetails($project);
        foreach ($projectDet->result() as $row) {
            $data['project_name'] = $row->name;
        }
        $data['milestones'] = $this->Milestone_model->getMilestones($project);
        
        echo($this->load->view('milestone/project_milestone', $data, TRUE));
    }

// Function to Add milestone from Ajax call
    public function AJAXaddMilestone() {
        if ($this->Milestone_model->insertMilestone()) {
            $data['milestone_master'] = $this->Milestone_model->getAllMilestonesMaster();
            $data['milestones'] = $this->Milestone_model->getMilestonesByProjectGroup();
            $data['allMilestones'] = $this->Milestone_model->getMilestones();
            $data['project_milestones'] = array();
            foreach ($data['milestones']->result() as $row) {
                $milestoneByProject = $this->Milestone_model->getMilestones($row->project);
                $temp = $this->getMilestoneReport($milestoneByProject->result());
                $temp['project_name'] = $row->project_name;
                $temp['project'] = $row->project;
                $temp['project_status'] = $row->project_status;
                $data['project_milestones'][] = $temp;
            }
            echo($this->load->view('milestone/milestone_summary_ajax', $data, TRUE));
        } else {
            echo 'Failed';
        }
    }

    public function AJAXshowOverallMilestones() {
        //remove unwanted calls from below
        $data['milestones'] = $this->Milestone_model->getMilestonesByProjectGroup();
        $data['project_milestones'] = array();
        foreach ($data['milestones']->result() as $row) {
            $milestoneByProject = $this->Milestone_model->getMilestones($row->project);
            $temp = $this->getMilestoneReport($milestoneByProject->result());
            $temp['project_name'] = $row->project_name;
            $temp['project_id'] = $row->project_id;
            $temp['project'] = $row->project;
            $temp['project_status'] = $row->project_status;
            $data['project_milestones'][] = $temp;
        }        
        
        echo($this->load->view('milestone/milestone_summary_ajax', $data, TRUE));
    }

    public function AJAXeditMilestoneForm() {
        $milestone = $this->input->post('milestone');
        $data['milestone_details'] = $this->Milestone_model->getMilestonByID($milestone);
        echo($this->load->view('milestone/edit_milestone', $data, TRUE));
    }

    public function AJAXupdateMilestone() {
        $result = $this->Milestone_model->updateMilestone();
    }

    public function AJAXgetMilestoneForm() {
        $data = array();
        $data['projects'] = $this->Admin_model->getCurrentProjects();
        $data['milestone_master'] = $this->Milestone_model->getAllMilestonesMaster();
        $data['milestones'] = $this->Milestone_model->getMilestonesByProjectGroup();

        echo($this->load->view('milestone/add_milestone', $data, TRUE));
    }

    public function AJAXgetMasterForm() {
        $data = array();
        echo($this->load->view('milestone/add_master_box', $data, TRUE));
    }

    public function AJAXaddMaster() {
        $data['lastMaster'] = $this->Milestone_model->insertMilestoneMaster();
        $data['milestone_master'] = $this->Milestone_model->getAllMilestonesMaster();
        echo($this->load->view('milestone/master_select_box_options', $data, TRUE));
    }

    public function AJAXdeleteMilestone() {
        $milestone = $this->input->post('milestone');
        if ($milestone != '') {
            $res = $this->Milestone_model->deleteMilestone($milestone);
        }
        return $res;
    }

    public function add_master() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');

        $data['milestones'] = $this->Milestone_model->getAllMilestonesMaster();

        if ($this->form_validation->run()) {
            if ($this->Milestone_model->insertMilestoneMaster()) {
                $this->session->set_flashdata('success', 'Milestone Added...');
                redirect('milestone/add_master');
            }
        }
        $this->load->view('admin/add_milestone_master', $data);
        $this->load->view('layout/footer');
    }

    public function add_milestone() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project', 'Project', 'required');
        $this->form_validation->set_rules('milestone', 'Milestone', 'required');
        $this->form_validation->set_rules('planned_date', 'Planned Date', 'required');

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        $data['milestones'] = $this->Milestone_model->getAllMilestonesMaster();

        if ($this->form_validation->run()) {
            if ($this->Milestone_model->insertMilestone()) {
                $this->session->set_flashdata('success', 'Milestone Added...');
                redirect('milestone/add_milestone');
            }
        }
        $data['details'] = $this->Milestone_model->getMilestones();
        $this->load->view('admin/add_milestone', $data);
        $this->load->view('layout/footer');
    }

    public function edit_milestone($milestone = '') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amended_date', 'Amended Date', 'required');
        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        $data['milestones'] = $this->Milestone_model->getAllMilestonesMaster();

        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                if ($this->Milestone_model->updateMilestone()) {
                    $this->session->set_flashdata('success', 'Milestone Updated...');
                    redirect('milestone/add_milestone');
                }
            }
            $milestone = $this->input->post('id');
            redirect('milestone/edit_milestone/' . $milestone);
        }
        if ($milestone != '') {
            $data['details'] = $this->Milestone_model->getMilestonByID($milestone);
        }
        $this->load->view('admin/edit_milestone', $data);
        $this->load->view('layout/footer');
    }

    public function view_milestone_overall() {

        $milestones = $this->Milestone_model->getMilestones();
        $data['report'] = array();

        $result = $this->getMilestoneReport($milestones->result());
        $data['report'][] = array("label" => "Lapsed", "y" => $result['lapsed']);
        $data['report'][] = array("label" => "Not Updated", "y" => $result['not_updated']);
        $data['report'][] = array("label" => "Balance To Achieve", "y" => $result['balance_to_achieve']);
        $data['report'][] = array("label" => "Achieved", "y" => $result['achieved']);

        $data['chartData'] = json_encode($data['report'], JSON_NUMERIC_CHECK);
        $this->load->view('view_milestone_overall', $data);
        $this->load->view('layout/footer');
    }

    public function view_milestone_by_project() {

        $project = '';
        $data['projects'] = $this->Admin_model->getAllProjects();

        if ($this->input->post()) {
            $project = $this->input->post('project');
        }
        $milestones = $this->Milestone_model->getMilestones($project);
        $result = $this->getMilestoneReport($milestones->result());

        $data['report'][] = array("label" => "Lapsed", "y" => $result['lapsed']);
        $data['report'][] = array("label" => "Not Updated", "y" => $result['not_updated']);
        $data['report'][] = array("label" => "Balance To Achieve", "y" => $result['balance_to_achieve']);
        $data['report'][] = array("label" => "Achieved", "y" => $result['achieved']);
        if ($project == '') {
            $projectName = 'All';
        } else {
            $projectNameRes = $this->Admin_model->getProjectDetails($project);
            foreach ($projectNameRes->result() as $row) {
                $projectName = $row->name;
            }
        }
        $data['project_name'] = $projectName;

        $data['chartData'] = json_encode($data['report'], JSON_NUMERIC_CHECK);
        $this->load->view('milestone_by_project', $data);
        $this->load->view('layout/footer');
    }

    public function getMilestoneReport($milestones) {
        $count = 0;
        $achieved = 0;
        $lapsed = 0;
        $not_updated = 0;
        $balance_to_achieve = 0;
        $today = date('Y-m-d');

        foreach ($milestones as $row) {
            $count++;
            if ($row->actual_date != '0000-00-00') {
                if ($row->actual_date <= $today) {  // Actual date should be less than today: This check can be avoided.
                    if ($row->actual_date > $row->planned_date) {
                        if ($row->amended_date != '0000-00-00') {
                            if ($row->actual_date > $row->amended_date) {
                                $lapsed++;
                            } else {
                                $achieved++;
                            }
                        } else {
                            $lapsed++;
                        }
                    } else {
                        $achieved++;
                    }
                }
            } elseif ($row->planned_date < $today) {
                if ($row->amended_date != '0000-00-00') {
                    if ($row->amended_date < $today) {
                        $not_updated++;
                    } else {
                        $balance_to_achieve++;
                    }
                } else {
                    $not_updated++;
                }
            } else {
                $balance_to_achieve++;
            }
        }
        $result = array('total' => $count, 'achieved' => $achieved, 'lapsed' => $lapsed, 'not_updated' => $not_updated, 'balance_to_achieve' => $balance_to_achieve);
        return $result;
    }

    public function AJAXgetSequenceNumber(){
        $project = $this->input->post('project');
        $sequence = $this->Milestone_model->getMaxSequence($project);
        echo $sequence;
    }
    
    public function AJAXgetProjectDates(){
        $project = $this->input->post('project');
        $res = $this->Admin_model->getProjectDetails($project);
        echo json_encode($res->result_array());
    }
    
    public function AJAXcheckMilestoneExist(){
        $milestone = $this->input->post('milestone');
        $project = $this->input->post('project');
        $msg = 'true';
        $res = $this->Milestone_model->getMilestonByIDProject($milestone, $project);
        if($res->num_rows() > 0){
            $msg = 'false';
        }
        echo $msg;
    }
    
    public function AJAXvalidateMilestoneMaster(){
        $milestone = $this->input->post('name');
        $result['result'] = 'true';
        if($this->Milestone_model->checkMilestoneMasterExists($milestone)){
            $result['result'] = 'false';
            $result['msg'] = 'Milestone already exists!';
        }
        echo json_encode($result);
    }
}
