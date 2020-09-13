<?php

class Project_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }
    
    public function insertProject() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        return $this->db->insert('projects', $data);
    }
    
    public function updateProject(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->where('id', $data['id']);
        return $this->db->update('projects', $data);
    }
    public function getProjectByName($name){
        $this->db->select('*');
        $this->db->where('name', $name);
        return $this->db->get('projects');
    }
}
