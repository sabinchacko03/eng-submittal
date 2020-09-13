<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Milestone_model');
        $this->load->model('Project_model');
        $this->load->model('User_model');
        $this->load->model('Menu_model');
    }

    public function index() {
        $data['projects'] = $this->Admin_model->getAllProjects();
        $this->load->view('projects/index', $data);
        $this->load->view('layout/footer');
    }

    public function AJAXgetAllProjects() {
        $data['projects'] = $this->Admin_model->getAllProjects();
        echo($this->load->view('projects/view_all_projects', $data, TRUE));
    }

    public function AJAXaddProjectForm() {
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['clients'] = $this->Admin_model->getAllClients();
        $data['users'] = $this->User_model->getAllUsers('project_manager');
        echo($this->load->view('projects/add_project', $data, TRUE));
    }

    public function AJAXaddProject() {
        $result = $this->Project_model->insertProject();
        $data['projects'] = $this->Admin_model->getAllProjects();
        echo($this->load->view('projects/view_all_projects', $data, TRUE));
    }

    public function AJAXshowEditForm() {
        $project = $this->input->post('project');
        $data['m_contractors'] = $this->Admin_model->getAllMainContractors();
        $data['clients'] = $this->Admin_model->getAllClients();
        $data['details'] = $this->Admin_model->getProjectDetails($project);
        echo($this->load->view('projects/edit_project', $data, TRUE));
    }

    public function AJAXupdateProject() {
        $result = $this->Project_model->updateProject();
        $data['projects'] = $this->Admin_model->getAllProjects();
        echo($this->load->view('projects/view_all_projects', $data, TRUE));
    }

    public function AJAXvalidateProjectName() {
        $name = $this->input->post('name');
        $res = $this->Project_model->getProjectByName($name);
        if ($res->num_rows()) {
            echo 'invalid';
        } else {
            echo 'valid';
        }
    }

}
