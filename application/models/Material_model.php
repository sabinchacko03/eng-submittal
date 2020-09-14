<?php

class Material_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function getOverallSummary(){
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('material.*');
        // $this->db->select("count(material.id) as total");
        $this->db->select("(SELECT COUNT(m1.id) FROM material as m1) as total");
        $this->db->select("(SELECT COUNT(m1.id) FROM material as m1 where m1.is_approved = 1) as approved");
        $this->db->select("COUNT(DISTINCT(material_submittal_log.material)) as submitted");
        $this->db->join('material_submittal_log', 'material_submittal_log.material = material.id', 'left');

        // $this->db->select('projects.name as project_name');
        // $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        // $this->db->group_by('material.project');        
        $res = $this->db->get('material');
        return $res;
    }

    public function getMaterialSummary(){
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('material.*');
        // $this->db->select("count(material.id) as total");
        $this->db->select("(SELECT COUNT(m1.id) FROM material as m1 where m1.project = material.project) as total");
        $this->db->select("(SELECT COUNT(m1.id) FROM material as m1 where m1.is_approved = 1 AND m1.project = material.project) as approved");
        $this->db->select("COUNT(DISTINCT(material_submittal_log.material)) as submitted");
        $this->db->join('material_submittal_log', 'material_submittal_log.material = material.id', 'left');

        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        // $this->db->group_by('material.id');
        $this->db->group_by('material.project');        
        $res = $this->db->get('material');
        return $res;
    }
    public function getMaterialSummary1() {
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('material.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        $this->db->select('departments.name as department');
        $this->db->join('departments', 'departments.id = material.department');
        $this->db->group_by('material.project');
        $res = $this->db->get('material');
        return $res;
    }

    public function getAllMaterialStatus(){
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('material_status');
        return $res;
    }

    public function insertMaterial(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->insert('material', $data);
        return $this->db->insert_id();
    }

    public function getAllMaterials($project = ''){
        if ($project != '') {
            $this->db->where('material.project', $project);
        }
        $this->db->select('material.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        $this->db->select('departments.name as department');
        $this->db->join('departments', 'departments.id = material.department');
        $res = $this->db->get('material');
        return $res;
    }

    public function checkMaterialExist(){
        $data = $this->input->post();
        $this->db->select('id');
        $this->db->where('project', $data['project']);
        $this->db->where('name', $data['name']);
        $res = $this->db->get('material');
        if ($res->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getMaterialByID($material){        
        $this->db->select('material.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        $this->db->select('departments.name as department');
        $this->db->join('departments', 'departments.id = material.department');
        $this->db->where('material.id', $material);
        $res = $this->db->get('material');
        return $res;
    }

    public function getAllMaterialLog($material){
        $this->db->select('material_submittal_log.*');
        $this->db->select('material_status.name as status');
        $this->db->join('material_status', 'material_status.id = material_submittal_log.status');
        $this->db->where('material_submittal_log.material', $material);
        $res = $this->db->get('material_submittal_log');
        return $res;
    }

    public function getMaterialStatus(){
        $this->db->select('*');
        $this->db->where('status', 1);
        return $this->db->get('material_status');
    }

    public function insertMaterialLog(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        unset($data['project']);
        $this->db->insert('material_submittal_log', $data);
        if ($data['status'] == 1) {
            $this->updateApproved($data['material']);
        }
        return $this->db->insert_id();
    }

    public function updateApproved($material){
        $this->db->set('is_approved', 1);
        $this->db->where('id', $material);
        return $this->db->update('material');        
    }
}