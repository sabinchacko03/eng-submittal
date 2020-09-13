<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function insertUser() {
        $data = $this->input->post();
        $data['password'] = md5($data['password']);
        unset($data['submit']);
        return $this->db->insert('users', $data);
    }

    public function updateUser() {
        $data = $this->input->post();
        unset($data['submit']);
        unset($data['username']);
        unset($data['email']);
        $this->db->where('id', $data['id']);
        return $this->db->update('users', $data);
    }

    public function getAllUsers($type = '') {
        $this->db->select('users.*');
        $this->db->select('user_type.type', 'type');
        $this->db->select('user_designations.name as user_designation');
        if ($type != '') {
            $this->db->where('user_designations.label', $type);
        }
        $this->db->join('user_type', 'user_type.id = users.user_type', 'left');
        $this->db->join('user_designations', 'user_designations.id = users.designation', 'left');
        $this->db->where('users.status', 1);
        $res = $this->db->get('users');
        return $res;
    }

    public function getAllTypes() {
        $this->db->select('*');
        $res = $this->db->get('user_type');
        return $res;
    }

    public function getDesignations() {
        $this->db->select('*');
        $res = $this->db->get('user_designations');
        return $res;
    }

    public function getAllUserProjects() {
        $this->db->select('*');
        $this->db->select('users.username as username');
        $this->db->select('projects.name as project_name');
        $this->db->join('users', 'users.id = user_projects.user');
        $this->db->join('projects', 'projects.id = user_projects.project');
        $res = $this->db->where('user_projects.status', 1);
        $res = $this->db->get('user_projects');
        return $res;
    }

    public function insertUserProjects() {
        $data = $this->input->post();
        $data['added_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['added_date'] = date('Y-m-d');
        unset($data['submit']);
        return $this->db->insert('user_projects', $data);
    }

    public function getUserEmail($userID) {
        $this->db->select('email');
        $this->db->where('id', $userID);
        $res = $this->db->get('users');
        $email = '';
        foreach ($res->result() as $row) {
            $email = $row->email;
        }
        return $email;
    }    
    
    public function getAdminEmails(){
        $this->db->select('users.email');
        $this->db->join('user_type', 'user_type.id = users.user_type');
        $this->db->where('user_type.type', 'admin');
        $this->db->where('users.status', 1);
        $res = $this->db->get('users');
        $emails = array();
        foreach($res->result() as $row){
            $emails[$row->email] = $row->email;
        }
        return $emails;
    }

    public function getUserDetails($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        return $this->db->get('users');
    }

    public function changePassword() {
        $data = $this->input->post();
        $data['password'] = md5($data['password']);
        unset($data['confirm_password']);
        unset($data['submit']);
        $this->db->where('id', $data['id']);
        return $this->db->update('users', $data);
    }

}
