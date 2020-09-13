<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Admin_model');
    }

    public function manage() {
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', array('is_unique' => 'Username already exists'));
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', array('is_unique' => 'Email already exists'));

        $data['users'] = $this->User_model->getAllUsers();
        $data['user_types'] = $this->User_model->getAllTypes();
        $data['designations'] = $this->User_model->getDesignations();

        if ($this->form_validation->run()) {
            if ($this->User_model->insertUser()) {
                $this->session->set_flashdata('success', 'User added successfully');
                redirect('user/manage');
            }
        }
        $this->load->view('user/user_management', $data);
        $this->load->view('layout/footer');
    }

    public function add_project_user() {
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'User', 'required|is_unique[users.username]', array('is_unique' => 'Username already exists'));
        $this->form_validation->set_rules('project', 'Project', 'required');

        $data['users'] = $this->User_model->getAllUsers();
        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['user_projects'] = $this->User_model->getAllUserProjects();

        if ($this->form_validation->run()) {
            if ($this->User_model->insertUserProjects()) {
                $this->session->set_flashdata('success', 'User added successfully');
                redirect('user/add_project_user');
            }
        }
        $this->load->view('user/add_project_user', $data);
        $this->load->view('layout/footer');
    }

    public function editUser($userID = '') {
        $this->load->library('form_validation');
//        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', array('is_unique' => 'Username already exists'));
//        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');

        if ($userID == '') {
            $userID = $this->input->post('id');
        }
        $data['details'] = $this->User_model->getUserDetails($userID);
        $data['user_types'] = $this->User_model->getAllTypes();
        $data['users'] = $this->User_model->getAllUsers();
        $data['designations'] = $this->User_model->getDesignations();

        if ($this->form_validation->run()) {
            if ($this->User_model->updateUser()) {
                $this->session->set_flashdata('success', 'User Updated successfully');
                redirect('user/manage');
            }
        }

        $this->load->view('user/edit_user', $data);
        $this->load->view('layout/footer');
    }

    public function change_password() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]',  array('matches' => 'Password not matching'));

        if ($this->form_validation->run()) {
            if ($this->User_model->changePassword()) {
                $this->session->set_flashdata('success', 'Password successfully');
//                redirect('user/manage');
            }
        }

        $this->load->view('user/confirm_password');
        $this->load->view('layout/footer');
    }

}
