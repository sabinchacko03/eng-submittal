<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_drawing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Shop_drawing_model');
        $this->load->model('Material_model');
        $this->load->model('User_model');
        $this->load->library("phpmailer_library");
    }

    public function index() {
        $data['material'] = $this->Shop_drawing_model->getDrawingSummary();
        $this->load->view('shop_drawing/index', $data);
        $this->load->view('layout/footer');
    }

    public function AJAXgetShopDrawingForm() {
        $data['projects'] = $this->Admin_model->getCurrentProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        $data['material_status'] = $this->Material_model->getAllMaterialStatus();
        echo($this->load->view('shop_drawing/add_shop_drawing', $data, TRUE));
    }

    public function AJAXValidateShopDrawing() {
        $result['result'] = 'true';
        $result['msg'] = '';
        if (!$this->Shop_drawing_model->checkShopDrawingExist()) {
            $result['result'] = 'false';
            $result['msg'] = 'Shop Drawing already exists!';
        }
        echo json_encode($result);
    }

    public function AJAXAddShopDrawing() {
        $project = $this->input->post('project');
        $res = $this->Shop_drawing_model->insertShopDrawing();
        $data['material'] = $this->Shop_drawing_model->getDrawingSummary();
        echo($this->load->view('shop_drawing/shop_drawing_summary', $data, TRUE));
    }

    public function AJAXgetDeptSummary() {
        $project = $this->input->post('project');
        $data['material'] = $this->Shop_drawing_model->getDrawingSummaryDept($project);
        echo($this->load->view('shop_drawing/shop_drawing_summary_dept', $data, TRUE));
    }

    public function AJAXgetShopDrawingProject() {
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $data['material'] = $this->Shop_drawing_model->getAllShopDrawing($project, $department);
        echo($this->load->view('shop_drawing/shop_drawing_project', $data, TRUE));
    }
    
    public function AJAXgetShopDrawingSummary(){
        $data['material'] = $this->Shop_drawing_model->getDrawingSummary();
        echo($this->load->view('shop_drawing/shop_drawing_summary', $data, TRUE));
    }

    public function AJAXShopDrawingSubmittalForm(){
        $material = $this->input->post('material');
        $data['materialDetails'] = $this->Shop_drawing_model->getShopDrawingByID($material);
        $data['materialLog'] = $this->Shop_drawing_model->getAllShopDrawingLog($material);
        $data['status'] = $this->Material_model->getMaterialStatus();
        echo($this->load->view('shop_drawing/shop_drawing_submittal', $data, TRUE));
    }
    
    public function AJAXAddShopDrawingLog(){
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $res = $this->Shop_drawing_model->insertShopDrawingLog();
        $data['material'] = $this->Shop_drawing_model->getAllShopDrawing($project, $department);
        echo($this->load->view('shop_drawing/shop_drawing_project', $data, TRUE));
    }
    
    public function AJAXGetShopDrawingLog() {
        $material = $this->input->post('id');
        $data['approved'] = $this->Shop_drawing_model->isApproved($material);
        $data['material_log'] = $this->Shop_drawing_model->getAllShopDrawingLog($material);
        echo($this->load->view('shop_drawing/shop_drawing_log', $data, TRUE));
    }
    
    public function AJAXGetShopDrawingLogDetails(){
        $log = $this->input->post('log');
        $data['material'] = $this->Shop_drawing_model->getShopDrawingLogDetails($log);
        $data['status'] = $this->Material_model->getMaterialStatus();
        echo($this->load->view('shop_drawing/shop_drawing_submittal_update', $data, TRUE));
    }
    
    public function AJAXupdateShopDrawingLog(){
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $res = $this->Shop_drawing_model->updateShopDrawingLog();        
        $data['material'] = $this->Shop_drawing_model->getAllShopDrawing($project, $department);
        echo($this->load->view('shop_drawing/shop_drawing_project', $data, TRUE));
    }
    
    public function AJAXgetShopDrawingEditForm(){
        $material = $this->input->post('material');
        $data['material'] = $this->Shop_drawing_model->getShopDrawingByID($material);
        echo($this->load->view('shop_drawing/edit_shop_drawing', $data, TRUE));
    }
    
    public function AJAXUpdateShopDrawing(){
        $res = $this->Shop_drawing_model->updateShopDrawing();
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $data['material'] = $this->Shop_drawing_model->getAllShopDrawing($project, $department);
        echo($this->load->view('shop_drawing/shop_drawing_project', $data, TRUE));
    }

    public function AJAXdeleteShopDrawing(){
        $material = $this->input->post('material');
        $ret = $this->Shop_drawing_model->deleteMaterial($material);
        $data['material'] = $this->Shop_drawing_model->getAllShopDrawing($ret['project'], $ret['department']);
        echo($this->load->view('shop_drawing/shop_drawing_project', $data, TRUE));
    }
}
