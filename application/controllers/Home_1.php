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

    public function daily_report() {

        if ($this->input->post('daily_report')) {
            $project_id = $this->input->post('project_id');
            $data['project_details'] = $this->Admin_model->getProjectDetails($project_id);
            $data['department'] = $this->input->post('department');
        }
        $this->load->view('daily_report', $data);
        $this->load->view('layout/footer');
    }
    
    public function view_report() {
        
        $department = $this->input->post('department');
        $project = $this->input->post('project');
        
        if ($this->input->post('view_material_submital')) {
            $data['mat_sub_log'] = $this->Admin_model->getAllMateralSubmital($project, $department);
            $data['department'] = $department;
            $data['project'] = $project;
            $this->load->view('material_submital_log', $data);
        }elseif($this->input->post('daily_report')){
            echo 'daily_report';die;
        }
        $this->load->view('layout/footer');
    }
}
