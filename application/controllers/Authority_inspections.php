<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authority_inspections extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_name', 'Project Name', 'required', 'Please enter Username');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required', 'Please enter password');
        $data['clients'] = $this->Admin_model->getAllClients();
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['projects'] = $this->Admin_model->getAllProjects();

        $this->load->view('admin_home', $data);
        $this->load->view('layout/footer');
    }
    
    public function add() {
        $this->load->model('Authority_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project', 'Project', 'required');
        $this->form_validation->set_rules('auth_dept', 'Department', 'required');
        $this->form_validation->set_rules('inspection', 'Inspection', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Authority_model->getAuthDepts();
        $data['status'] = $this->Authority_model->getAuthStatus();

        if ($this->form_validation->run()) {
            if ($this->Authority_model->insertAuthInsp()) {
                $this->session->set_flashdata('success', 'Authority Inspection Added...');
                redirect('authority_inspections/add');
            }
        }
        $data['details'] = $this->Authority_model->getAuthInspections();
        $this->load->view('admin/add_auth_inspection', $data);
        $this->load->view('layout/footer');
    }
    
    public function departments() {
        $this->load->model('Authority_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project', 'Project', 'required');

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Authority_model->getAuthDepts();
        $data['status'] = $this->Authority_model->getAuthStatus();

        if ($this->form_validation->run()) {
            if ($this->Authority_model->insertAuthInsp()) {
                $this->session->set_flashdata('success', 'Authority Inspection Added...');
                redirect('authority_inspections/add');
            }
        }
        $data['details'] = $this->Authority_model->getAuthInspections();
        $this->load->view('admin/add_auth_inspection', $data);
        $this->load->view('layout/footer');
    }

}
