<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Material_model');
        $this->load->model('User_model');
        $this->load->library("phpmailer_library");
    }

    public function index() {
        $data['material'] = $this->Material_model->getMaterialSummary();
        $this->load->view('material/index', $data);
        $this->load->view('layout/footer');
    }

    public function AJAXgetOverallMaterial(){
        $data['material'] = $this->Material_model->getOverallSummary();
        echo($this->load->view('material/overall_material_summary', $data, TRUE));
    }
    public function AJAXgetMaterialForm() {
        $data['projects'] = $this->Admin_model->getCurrentProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        $data['material_status'] = $this->Material_model->getAllMaterialStatus();
        echo($this->load->view('material/add_material', $data, TRUE));
    }

    public function AJAXValidateMaterial(){
        $result['result'] = 'true';
        $result['msg'] = '';
        if (!$this->Material_model->checkMaterialExist()) {
            $result['result'] = 'false';
            $result['msg'] = 'Material already exists!';
        }
        echo json_encode($result);
    }

    public function AJAXAddMaterial(){
        $project = $this->input->post('project');
        $res = $this->Material_model->insertMaterial();
        $data['material'] = $this->Material_model->getMaterialSummary();
        echo($this->load->view('material/material_summary', $data, TRUE));
    }

    public function AJAXgetMaterialProject(){
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $data['material'] = $this->Material_model->getAllMaterials($project, $department);
        echo($this->load->view('material/material_project', $data, TRUE));
    }

    public function AJAXgetMaterialSummary(){
        $data['material'] = $this->Material_model->getMaterialSummary();
        echo($this->load->view('material/material_summary', $data, TRUE));
    }
    
    public function AJAXMaterialSubmittalForm(){
        $material = $this->input->post('material');
        $data['materialDetails'] = $this->Material_model->getMaterialByID($material);
        $data['materialLog'] = $this->Material_model->getAllMaterialLog($material);
        $data['status'] = $this->Material_model->getMaterialStatus();
        echo($this->load->view('material/material_submittal', $data, TRUE));
    }

    public function AJAXAddMaterialLog(){
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $res = $this->Material_model->insertMaterialLog();
        $data['material'] = $this->Material_model->getAllMaterials($project, $department);
        echo($this->load->view('material/material_project', $data, TRUE));
    }

    public function AJAXGetMaterialSubmittalLog() {
        $material = $this->input->post('id');
        $data['approved'] = $this->Material_model->isApproved($material);
        $data['material_log'] = $this->Material_model->getAllMaterialLog($material);
        echo($this->load->view('material/material_submittal_log', $data, TRUE));
    }
    
    public function AJAXGetMaterialLogDetails(){
        $log = $this->input->post('log');
        $data['material'] = $this->Material_model->getMaterialLogDetails($log);
        $data['status'] = $this->Material_model->getMaterialStatus();
        echo($this->load->view('material/material_submittal_update', $data, TRUE));
    }
    
    public function AJAXupdateMaterialLog(){
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $res = $this->Material_model->updateMaterialLog();        
        $data['material'] = $this->Material_model->getAllMaterials($project, $department);
        echo($this->load->view('material/material_project', $data, TRUE));
    }
    
    public function AJAXgetDeptSummary(){
        $project = $this->input->post('project');
        $data['material'] = $this->Material_model->getMaterialSummaryDept($project);
        echo($this->load->view('material/material_summary_dept', $data, TRUE));
    }
    
    public function AJAXgetMaterialEditForm(){
        $material = $this->input->post('material');
        $data['material'] = $this->Material_model->getMaterialByID($material);
        echo($this->load->view('material/edit_material', $data, TRUE));
    }
    
    public function AJAXUpdateMaterial(){
        $res = $this->Material_model->updateMaterial();
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $data['material'] = $this->Material_model->getAllMaterials($project, $department);
        echo($this->load->view('material/material_project', $data, TRUE));
    }

    public function AJAXdeleteMaterial(){
        $material = $this->input->post('material');
        $ret = $this->Material_model->deleteMaterial($material);
        $data['material'] = $this->Material_model->getAllMaterials($ret['project'], $ret['department']);
        echo($this->load->view('material/material_project', $data, TRUE));
    }
}