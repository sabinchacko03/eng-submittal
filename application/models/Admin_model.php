<?php

class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function insertClient() {
        $data = array(
            'name' => $this->input->post('client_name'),
            'phone' => $this->input->post('client_phone'),
            'email' => $this->input->post('client_email'),
//            'location' => $this->input->post('location')
        );
        return $this->db->insert('clients', $data);
    }

    public function insertMainContractor() {
        $data = array(
            'name' => $this->input->post('mcont_name'),
            'phone' => $this->input->post('mcont_phone'),
            'email' => $this->input->post('mcont_email'),
        );
        return $this->db->insert('main_contractors', $data);
    }

    public function insertProject() {
        $data = array(
            'name' => $this->input->post('project_name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'client' => $this->input->post('client'),
            'consultant' => $this->input->post('consultant'),
            'm_contractor' => $this->input->post('m_contractor'),
            'project_value' => $this->input->post('project_value'),
            'location' => $this->input->post('location'),
        );
        return $this->db->insert('projects', $data);
    }

    public function getAllClients() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('clients');
        return $res;
    }

    public function getAllMainContractors() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('main_contractors');
        return $res;
    }

    public function getAllProjects() {
        $userID = $this->session->userdata('user_id');
        $this->db->select('projects.*')->from('projects');
        $this->db->where('projects.status', 1);
        if($this->session->userdata('user_type') != 'admin'){
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = '.$userID.')');
//            $this->db->where_in('project.id')
        }
        $this->db->select('clients.name as client_name');
        $this->db->select('main_contractors.name as mc_name');
        $this->db->join('clients', 'clients.id = projects.client');
        $this->db->join('main_contractors', 'main_contractors.id = projects.m_contractor');
        $res = $this->db->get('');
        return $res;
    }

    public function getCurrentProjects() {
        $userID = $this->session->userdata('user_id');
        $this->db->select('projects.*')->from('projects');
        $this->db->where('projects.status', 1);
        if($this->session->userdata('user_type') != 'admin'){
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = '.$userID.')');
//            $this->db->where_in('project.id')
        }
        $this->db->where('projects.end_date >=', date('Y-m-d'));
        $this->db->select('clients.name as client_name');
        $this->db->select('main_contractors.name as mc_name');
        $this->db->join('clients', 'clients.id = projects.client');
        $this->db->join('main_contractors', 'main_contractors.id = projects.m_contractor');
        $res = $this->db->get('');
        return $res;
    }

    public function getAllDepartments() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('departments');
        return $res;
    }

    public function getProjectDetails($id) {
        $this->db->select('projects.*');
        $this->db->select('clients.name as client_name');
        $this->db->select('main_contractors.name as mc_name');
        $this->db->join('clients', 'clients.id = projects.client');
        $this->db->join('main_contractors', 'main_contractors.id = projects.m_contractor');
        $this->db->where('projects.status', 1);
        $this->db->where('projects.id', $id);
        $res = $this->db->get('projects');
        return $res;
    }

    public function insertMaterialSubmital() {
        $data = $this->input->post();
        unset($data['submit']);
        return $this->db->insert('mat_sub_log', $data);
    }

    public function getAllMateralSubmital($project = '', $dept = '') {
        $this->db->select('*');
//        $this->db->where('status', 1);
        if ($project != '') {
            $this->db->where('project_id', $project);
        }
        if ($dept != '') {
            $this->db->where('dept_id', $dept);
        }
        $res = $this->db->get('mat_sub_log');
        return $res;
    }

    public function insertDailyManpower() {
        $data = $this->input->post();
        unset($data['submit']);
        return $this->db->insert('daily_manpower', $data);
    }

    public function getDailyManpower($project = '', $dept = '') {
        $this->db->select('*');
        if ($project != '') {
            $this->db->where('project', $project);
        }
        if ($dept != '') {
            $this->db->where('department', $dept);
        }
        $this->db->select('projects.name as project_name');
        $this->db->join('projects', "projects.id = project");
        $this->db->select('departments.name as dept_name');
        $this->db->join('departments', "departments.id = department");
        $this->db->order_by('date', 'desc');
        $res = $this->db->get('daily_manpower');
        return $res;
    }

    public function insertBilling() {
        $data = $this->input->post();
        $data['date'] = date("Y-m-d H:i:s");
        $data['user'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        return $this->db->insert('billing', $data);
    }

    public function getBilling($project = '') {
        $this->db->select('billing.*');
        if ($project != '') {
            $this->db->where('project', $project);
        }
        $this->db->select('projects.name as project_name');
        $this->db->join('projects', "projects.id = project");
        $this->db->select('departments.name as dept_name');
        $this->db->join('departments', "departments.id = department");
        $this->db->order_by('date', 'desc');
        $res = $this->db->get('billing');
        return $res;
    }

    public function cleanUp() {
        $this->db->truncate('billing');
        $this->db->truncate('critical_issue');
        $this->db->truncate('inspections');
        $this->db->truncate('inspection_history');
        $this->db->truncate('project_milestones');
        $this->db->truncate('material');
        $this->db->truncate('material_submittal_log');
        return true;
    }

}
