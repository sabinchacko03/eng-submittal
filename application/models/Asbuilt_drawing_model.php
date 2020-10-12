<?php

class Asbuilt_drawing_model extends CI_Model {

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
        $this->db->select("COUNT(DISTINCT(asbuilt_drawing.material)) as submitted");        
        $this->db->join('asbuilt_drawing', 'asbuilt_drawing.material = material.id', 'left');

        // $this->db->select('projects.name as project_name');
        // $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = material.project');
        // $this->db->group_by('material.project');        
        $res = $this->db->get('material');
        return $res;
    }

    public function getDrawingSummary(){
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('asbuilt_drawing.*');
        // $this->db->select("count(asbuilt_drawing.id) as total");
        $this->db->select("(SELECT COUNT(m1.id) FROM asbuilt_drawing as m1 where m1.project = asbuilt_drawing.project) as total");
        $this->db->select("COUNT(DISTINCT(asbuilt_drawing_log.shop_drawing)) as submitted");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'A' and m1.project = asbuilt_drawing.project) as approved");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'B' and m1.project = asbuilt_drawing.project) as b");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'C' and m1.project = asbuilt_drawing.project) as c");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'D' and m1.project = asbuilt_drawing.project) as d");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'UR' and m1.project = asbuilt_drawing.project) as ur");
        $this->db->join('asbuilt_drawing_log', 'asbuilt_drawing_log.shop_drawing = asbuilt_drawing.id', 'left');

        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = asbuilt_drawing.project');
        // $this->db->group_by('asbuilt_drawing.id');
        $this->db->group_by('asbuilt_drawing.project');        
        $res = $this->db->get('asbuilt_drawing');
        return $res;
    }
    public function getDrawingSummaryDept($project = '') {
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('asbuilt_drawing.*');
        // $this->db->select("count(asbuilt_drawing.id) as total");
        $this->db->select("(SELECT COUNT(m1.id) FROM asbuilt_drawing as m1 where m1.project = asbuilt_drawing.project AND m1.department = asbuilt_drawing.department) as total");        
        $this->db->select("COUNT(DISTINCT(asbuilt_drawing_log.shop_drawing)) as submitted");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'A' and m1.project = asbuilt_drawing.project AND m1.department = asbuilt_drawing.department) as approved");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'B' and m1.project = asbuilt_drawing.project AND m1.department = asbuilt_drawing.department) as b");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'C' and m1.project = asbuilt_drawing.project AND m1.department = asbuilt_drawing.department) as c");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'D' and m1.project = asbuilt_drawing.project AND m1.department = asbuilt_drawing.department) as d");
        $this->db->select("(SELECT COUNT(m1.id) from asbuilt_drawing m1 INNER JOIN material_status as ms on ms.id = m1.status WHERE ms.name = 'UR' and m1.project = asbuilt_drawing.project AND m1.department = asbuilt_drawing.department) as ur");
        $this->db->join('asbuilt_drawing_log', 'asbuilt_drawing_log.shop_drawing = asbuilt_drawing.id', 'left');

        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = asbuilt_drawing.project');
        $this->db->select('departments.name as department_name');
        $this->db->join('departments', 'asbuilt_drawing.department = departments.id');
        if($project != ''){
            $this->db->where('asbuilt_drawing.project', $project);
            $this->db->group_by('asbuilt_drawing.department');
            $this->db->order_by('departments.order_id', 'asc');
        }else{
            $this->db->group_by('asbuilt_drawing.project');
        }                
        $res = $this->db->get('asbuilt_drawing');
        return $res;
    }

    public function getAllMaterialStatus(){
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('material_status');
        return $res;
    }

    public function insertShopDrawing(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->insert('asbuilt_drawing', $data);
        return $this->db->insert_id();
    }

    public function getAllShopDrawing($project = '', $department = ''){
        if ($project != '') {
            $this->db->where('asbuilt_drawing.project', $project);
            if ($department != '') {
                $this->db->where('asbuilt_drawing.department', $department);
            }
        }
        $this->db->select('asbuilt_drawing.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = asbuilt_drawing.project');
        $this->db->select('departments.name as department');
        $this->db->select('(SELECT mat_stat.name FROM material_status as mat_stat INNER JOIN asbuilt_drawing_log as log ON log.status=mat_stat.id WHERE log.shop_drawing = asbuilt_drawing.id ORDER BY log.id DESC LIMIT 1) as status');
        $this->db->join('departments', 'departments.id = asbuilt_drawing.department');
        $res = $this->db->get('asbuilt_drawing');
        return $res;
    }

    public function checkShopDrawingExist(){
        $data = $this->input->post();
        $this->db->select('id');
        $this->db->where('project', $data['project']);
        $this->db->where('name', $data['name']);
        $res = $this->db->get('asbuilt_drawing');
        if ($res->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getShopDrawingByID($material){        
        $this->db->select('asbuilt_drawing.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = asbuilt_drawing.project');
        $this->db->select('departments.name as department_name');
        $this->db->join('departments', 'departments.id = asbuilt_drawing.department');
        $this->db->where('asbuilt_drawing.id', $material);
        $res = $this->db->get('asbuilt_drawing');
        return $res;
    }

    public function getAllShopDrawingLog($material){
        $this->db->select('asbuilt_drawing_log.*');
        $this->db->select('material_status.name as status');
        $this->db->join('material_status', 'material_status.id = asbuilt_drawing_log.status');
        $this->db->where('asbuilt_drawing_log.shop_drawing', $material);
        $this->db->order_by('revision', 'asc');
        $res = $this->db->get('asbuilt_drawing_log');
        return $res;
    }

    public function getMaterialStatus(){
        $this->db->select('*');
        $this->db->where('status', 1);
        return $this->db->get('material_status');
    }

    public function insertShopDrawingLog(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        unset($data['project']);
        unset($data['department']);
        $this->db->insert('asbuilt_drawing_log', $data);
        if ($data['status'] == 1) {
            $this->updateApproved($data['shop_drawing']);
        }
        $this->updateShopDrawingStatus($data['shop_drawing'], $data['status']);
        return $this->db->insert_id();
    }

    public function updateApproved($material){
        $this->db->set('is_approved', 1);
        $this->db->where('id', $material);
        return $this->db->update('asbuilt_drawing');        
    }
    public function isApproved($material){
        $this->db->select('*');
        $this->db->where('id', $material);
        $this->db->where('is_approved', 1);
        $res = $this->db->get('asbuilt_drawing');
        if($res->num_rows() > 0){
            return TRUE;
        }else{
            return false;
        }
    }
    
    public function getShopDrawingLogDetails($log){
        $this->db->select('log.*');
        $this->db->select('asbuilt_drawing.name as material_name');
        $this->db->select('asbuilt_drawing.project as project');
        $this->db->select('asbuilt_drawing.department as department');
        $this->db->join('asbuilt_drawing', 'log.shop_drawing = asbuilt_drawing.id');
        $this->db->where('log.id', $log);
        return $this->db->get('asbuilt_drawing_log as log');
    }
    
    public function updateShopDrawingLog(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        unset($data['project']);
        unset($data['department']);
        $this->db->where('id', $data['id']);
        $this->db->update('asbuilt_drawing_log', $data);
        if ($data['status'] == 1) {
            $this->updateApproved($data['shop_drawing']);
        }
        $this->updateShopDrawingStatus($data['shop_drawing'], $data['status']);
        return $this->db->insert_id();
    }
    public function updateShopDrawingStatus($material, $status){
        $this->db->set('status', $status);
        $this->db->where('id', $material);
        return $this->db->update('asbuilt_drawing');
    }
    
    public function updateShopDrawing(){
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        unset($data['project']);
        unset($data['department']);
        $this->db->where('id', $data['id']);
        $this->db->update('asbuilt_drawing', $data);
    }

    public function deleteMaterial($id){
        $data = $this->getShopDrawingByID($id);
        $this->deleteMaterialLog($id);
        foreach($data->result() as $row){
            $ret['project'] = $row->project;
            $ret['department'] = $row->department;
            $ret['project_name'] = $row->project_name;
        }
        $res = $this->db->delete('asbuilt_drawing', array('id' => $id));        
        return $ret;
    }

    public function deleteMaterialLog($id){
        $this->db->delete('asbuilt_drawing_log', array('shop_drawing' => $id));
    }
}