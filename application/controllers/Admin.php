<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    public function add_project() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_name', 'Project Name', 'required', 'Please enter Username');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required', 'Please enter password');
        $this->form_validation->set_rules('end_date', 'End Date', 'required', 'Please enter password');
        $this->form_validation->set_rules('m_contractor', 'Main Contractor', 'required', 'Please enter password');
        $this->form_validation->set_rules('client', 'Client', 'required', 'Please enter password');
        $this->form_validation->set_rules('consultant', 'Consultant', 'required', 'Please enter password');
        $this->form_validation->set_rules('project_value', 'Project Value', 'required', 'Please enter password');
        $data['clients'] = $this->Admin_model->getAllClients();
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['projects'] = $this->Admin_model->getAllProjects();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertProject()) {
                $this->session->set_flashdata('success', 'Project added successfully');
                redirect('admin');
            }
        } else {
            $this->load->view('admin_home', $data);
            $this->load->view('layout/footer');
        }
    }

    public function add_client() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('client_name', 'Client Name', 'required');
   
        $data['clients'] = $this->Admin_model->getAllClients();
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['projects'] = $this->Admin_model->getAllProjects();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertClient()) {
                $this->session->set_flashdata('success', 'Client added successfully');
                redirect('admin');
            }
        } else {
            $this->load->view('admin_home', $data);
            $this->load->view('layout/footer');
        }
    }

    public function add_main_contractor() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mcont_name', 'Name', 'required');

        $data['clients'] = $this->Admin_model->getAllClients();
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['projects'] = $this->Admin_model->getAllProjects();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertMainContractor()) {
                $this->session->set_flashdata('success', 'Contractor added successfully');
                redirect('admin');
            }
        } else {
            $this->load->view('admin_home', $data);
        }
        $this->load->view('layout/footer');
    }

    public function add_material_submital() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('dept_id', 'Department', 'required');

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertMaterialSubmital()) {
                $this->session->set_flashdata('success', 'Material Submittal added successfully');
                redirect('admin/add_material_submital');
            }
        } else {
            $this->load->view('admin/material_submital_log_add', $data);
        }
        $this->load->view('layout/footer');
    }

    public function add_daily_manpower() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project', 'Project', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('activity', 'Activity', 'required');

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertDailyManpower()) {
                $this->session->set_flashdata('success', 'Daily Manpower added successfully');
                redirect('admin/add_daily_manpower');
            }
        }
        $data['details'] = $this->Admin_model->getDailyManpower();
        $this->load->view('admin/add_daily_manpower', $data);
        $this->load->view('layout/footer');
    }
    
    public function add_billing() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project', 'Project', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('projected', 'Projected Amount', 'required');
        $this->form_validation->set_rules('actual', 'Actual Amount', 'required');

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertBilling()) {
                $this->session->set_flashdata('success', 'Billing added successfully');
                redirect('admin/add_billing');
            }
        }
        $data['details'] = $this->Admin_model->getBilling();
        $this->load->view('admin/add_billing', $data);
        $this->load->view('layout/footer');
    }
    
    public function add_authority_inspection() {
        $this->load->model('Authority_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project', 'Project', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('projected', 'Projected Amount', 'required');
        $this->form_validation->set_rules('actual', 'Actual Amount', 'required');

        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Authority_model->getAuthDepts();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertBilling()) {
                $this->session->set_flashdata('success', 'Billing added successfully');
                redirect('admin/add_auth_inspection');
            }
        }
        $data['details'] = $this->Admin_model->getBilling();
        $this->load->view('admin/add_auth_inspection', $data);
        $this->load->view('layout/footer');
    }
    
    public function user_management() {
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $data['users'] = $this->User_model->getAllUsers();

        if ($this->form_validation->run()) {
            if ($this->Admin_model->insertUser()) {
                $this->session->set_flashdata('success', 'User added successfully');
//                redirect('admin/user_management');
            }
        }
        $this->load->view('admin/user_management', $data);
        $this->load->view('layout/footer');
    }
    public function cleanup(){
        $res = $this->Admin_model->cleanUp();
        if($res){
            echo "CleanedUp Succesfully...";
            redirect('projects');
        }else{
            echo 'Cleanup Failed!';
        }
    }

}
