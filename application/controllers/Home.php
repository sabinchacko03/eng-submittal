<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkManagerLogged();
        $this->load->model('Admin_model');
    }

    public function index() {
        $data['clients'] = $this->Admin_model->getAllClients();
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['project_details'] = $this->Admin_model->getProjectDetails($data['projects']->first_row()->id);
        $data['departments'] = $this->Admin_model->getAllDepartments();

        if ($this->input->post('project')) {
            $data['project_details'] = $this->Admin_model->getProjectDetails($this->input->post('project'));
        }
        $this->load->view('home', $data);
        $this->load->view('layout/footer');
    }

    public function material_submittal_log() {

        $data['clients'] = $this->Admin_model->getAllClients();
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['project_details'] = $this->Admin_model->getProjectDetails($data['projects']->first_row()->id);
        $data['departments'] = $this->Admin_model->getAllDepartments();

        if ($this->input->post()) {
            $department = $this->input->post('department');
            $project = $this->input->post('project');
            $data['mat_sub_log'] = $this->Admin_model->getAllMateralSubmital($project, $department);
            $data['department'] = $department;
            $data['project'] = $project;
        }
        $this->load->view('material_submital_log', $data);
        $this->load->view('layout/footer');
    }

    public function view_project() {

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        
        if ($this->input->post('project_id')) {
            $pid = $this->input->post('project_id');
            $data['details'] = $this->Admin_model->getProjectDetails($pid);
        }
        $this->load->view('view_project', $data);
        $this->load->view('layout/footer');
    }
    public function coming_soon() {

        $this->load->view('coming_soon');
        $this->load->view('layout/footer');
    }
    
    public function view_more($pid) {

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        
        if (isset($pid)) {
            $data['details'] = $this->Admin_model->getProjectDetails($pid);
        }
        $this->load->view('view_project', $data);
        $this->load->view('layout/footer');
    }
    
    public function daily_manpower(){
        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        
        if ($this->input->post()) {
            $pid = $this->input->post('project_id');
            $did = $this->input->post('dept_id');
            $data['details'] = $this->Admin_model->getDailyManpower($pid, $did);
        }
        $this->load->view('daily_manpower', $data);
        $this->load->view('layout/footer');
    }
}
