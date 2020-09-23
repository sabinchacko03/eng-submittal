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
        $this->db->select("COUNT(DISTINCT(material_submittal_log.material)) as submitted");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'A' and m1.project = material.project) as approved");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'B' and m1.project = material.project) as b");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'C' and m1.project = material.project) as c");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'D' and m1.project = material.project) as d");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'UR' and m1.project = material.project) as ur");
        $this->db->join('material_submittal_log', 'material_submittal_log.material = material.id', 'left');

        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        // $this->db->group_by('material.id');
        $this->db->group_by('material.project');        
        $res = $this->db->get('material');
        return $res;
    }
    public function getMaterialSummaryDept($project = '') {
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('material.*');
        // $this->db->select("count(material.id) as total");
        $this->db->select("(SELECT COUNT(m1.id) FROM material as m1 where m1.project = material.project AND m1.department = material.department) as total");        
        $this->db->select("COUNT(DISTINCT(material_submittal_log.material)) as submitted");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'A' and m1.project = material.project AND m1.department = material.department) as approved");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'B' and m1.project = material.project AND m1.department = material.department) as b");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'C' and m1.project = material.project AND m1.department = material.department) as c");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'D' and m1.project = material.project AND m1.department = material.department) as d");
        $this->db->select("(SELECT COUNT(m1.id) from material m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'UR' and m1.project = material.project AND m1.department = material.department) as ur");
        $this->db->join('material_submittal_log', 'material_submittal_log.material = material.id', 'left');

        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        $this->db->select('departments.name as department_name');
        $this->db->join('departments', 'material.department = departments.id');
        if($project != ''){
            $this->db->where('material.project', $project);
            $this->db->group_by('material.department');
        }else{
            $this->db->group_by('material.project');
        }                
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

    public function getAllMaterials($project = '', $department = ''){
        if ($project != '') {
            $this->db->where('material.project', $project);
            if ($department != '') {
                $this->db->where('material.department', $department);
            }
        }
        $this->db->select('material.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        $this->db->select('departments.name as department');
        $this->db->select('(SELECT mat_stat.name FROM material_status as mat_stat INNER JOIN material_submittal_log as log ON log.status=mat_stat.id WHERE log.material = material.id ORDER BY log.id DESC LIMIT 1) as status');
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
        $this->db->select('departments.name as department_name');
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
        unset($data['department']);
        $this->db->insert('material_submittal_log', $data);
        if ($data['status'] == 1) {
            $this->updateApproved($data['material']);
        }
        $this->updateMaterialStatus($data['material'], $data['status']);
        return $this->db->insert_id();
    }

    public function updateApproved($material){
        $this->db->set('is_approved', 1);
        $this->db->where('id', $material);
        return $this->db->update('material');        
    }
    public function isApproved($material){
        $this->db->select('*');
        $this->db->where('id', $material);
        $this->db->where('is_approved', 1);
        $res = $this->db->get('material');
        if($res->num_rows() > 0){
            return TRUE;
        }else{
            return false;
        }
    }
    
    public function getMaterialLogDetails($log){
        $this->db->select('log.*');
        $this->db->select('material.name as material_name');
        $this->db->select('material.project as project');
        $this->db->select('material.department as department');
        $this->db->join('material', 'log.material = material.id');
        $this->db->where('log.id', $log);
        return $this->db->get('material_submittal_log as log');
    }
    
    public function updateMaterialLog(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        unset($data['project']);
        unset($data['department']);
        $this->db->where('id', $data['id']);
        $this->db->update('material_submittal_log', $data);
        if ($data['status'] == 1) {
            $this->updateApproved($data['material']);
        }
        $this->updateMaterialStatus($data['material'], $data['status']);
        return $this->db->insert_id();
    }
    public function updateMaterialStatus($material, $status){
        $this->db->set('status', $status);
        $this->db->where('id', $material);
        return $this->db->update('material');
    }
    
    public function updateMaterial(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        unset($data['project']);
        unset($data['department']);
        $this->db->where('id', $data['id']);
        $this->db->update('material', $data);
    }
}