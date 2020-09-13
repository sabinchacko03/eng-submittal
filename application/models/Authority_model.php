<?php

class Authority_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }
    
    public function getAuthDepts() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('auth_depts');
        return $res;
    }
    
    public function getAuthStatus() {
        $this->db->select('*');
        $res = $this->db->get('auth_inspections');
        return $res;
    }
    
    public function getAuthDeptByID($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->get('auth_depts');
        return $res;
    }
    
    public function getAuthInspections($project = '') {
        $this->db->select('*');
        if ($project != '') {
            $this->db->where('project', $project);
        }
        $this->db->select('projects.name as project_name');
        $this->db->join('projects', "projects.id = project");
        $this->db->select('auth_depts.name as auth_dept');
        $this->db->join('auth_depts', "auth_depts.id = auth_dept");
        $this->db->select('auth_insp_status.name as status');
        $this->db->join('auth_insp_status', "auth_insp_status.id = auth_inspections.status");
        $this->db->order_by('auth_inspections.id', 'desc');
        $res = $this->db->get('auth_inspections');
        return $res;
    }
    
    public function insertAuthInsp() {
        $data = $this->input->post();
        $data['user'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        return $this->db->insert('auth_inspections', $data);
    }
    
    public function insertAuthDept() {
        $data = $this->input->post();
        unset($data['submit']);
        return $this->db->insert('auth_depts', $data);
    }
    
    
}
