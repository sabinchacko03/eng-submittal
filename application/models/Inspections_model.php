<?php

class Inspections_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function getInspectionSummary() {
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('inspections.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->join('projects', 'projects.id = inspections.project');
        $this->db->group_by('inspections.project');
        $res = $this->db->get('inspections');
        return $res;
    }

    public function getInspectionSummaryProject($project) {
        $update_required = 0;
        $rejected = 0;
        $approved = 0;
        $total = 0;
        $this->db->select('inspections.*');
        $this->db->where('project', $project);
        $res = $this->db->get('inspections');
        foreach ($res->result_array() as $row) {
            $history = $this->getAllInspectionHistory($row['id']);
            if (count($history->result()) == 0) {
                $update_required++;
            } elseif ($row['completed_flag']) {
                $approved++;
            } else {
                $rejected++;
            }
            $total++;
        }
        $result = array('update_required' => $update_required, 'rejected' => $rejected, 'approved' => $approved, 'total_inspections' => $total);
        return $result;
    }

    public function getAllInspections($project = '') {
        if ($project != '') {
            $this->db->where('inspections.project', $project);
        }
        $this->db->select('inspections.*');
        $this->db->select('inspection_master.name as inspection_name');
        $this->db->select('projects.name as project_name');
        $this->db->select('COUNT(inspection_history.id) as inspection_no');
        $this->db->select('MAX(inspection_history.date) as last_inpsection_date');
        $this->db->select('milestones_master.name as milestone');
//        $this->db->select('project_milestones.amended_date as amended_date');
//        $this->db->select('project_milestones.planned_date as planned_date');
        $this->db->select('CASE WHEN project_milestones.amended_date = "0000-00-00" THEN project_milestones.planned_date ELSE project_milestones.amended_date END as planned_date', FALSE);
        $this->db->join('inspection_history', "inspection_history.inspection = inspections.id", 'left');
        $this->db->join('project_milestones', "project_milestones.id = inspections.milestone", 'left')->join('milestones_master', 'milestones_master.id = project_milestones.milestone', 'left');
        $this->db->join('inspection_master', "inspection_master.id = inspections.inspection");
        $this->db->join('projects', "projects.id = inspections.project");
//        $this->db->join('project_milestones', "project_milestones.id = inspections.milestone");
        $this->db->group_by('inspection_history.inspection');
        $this->db->group_by('inspections.id');
        $this->db->order_by('inspections.id', 'desc');
        $res = $this->db->get('inspections');
        
        $total = $res->result_array();
        $today = date('Y-m-d');
        foreach ($total as $key => $row) {
            $total[$key]['is_completed'] = FALSE;
            $history = $this->getAllInspectionHistory($row['id']);
            if (count($history->result()) == 0) {
                $status = '<span class="badge badge-warning">Update Required</span>';
            } elseif ($row['completed_flag']) {
                $total[$key]['is_completed'] = TRUE;
                $status = '<span class="badge badge-success">Approved</span>';
            } else {
                $status = '<span class="badge badge-danger">Rejected</span>';
            }
            $total[$key]['status'] = $status;
        }

        return $total;
    }

    public function insertInspection() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->insert('inspections', $data);
        return $this->db->insert_id();
    }

    public function getAllInspectionMaster() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('inspection_master');
        return $res;
    }

    public function insertInspectionMaster() {
        $data = $this->input->post();
        $data['added_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['added_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->insert('inspection_master', $data);
        return $this->db->insert_id();
    }

    public function getInspectionByID($inspection) {
        $this->db->select('inspections.*');
        $this->db->select('inspection_master.name as inspection_name');
        $this->db->select('projects.name as project_name');
        $this->db->select('milestones_master.name as milestone');
        $this->db->join('milestones_master', "milestones_master.id = inspections.milestone", 'left');
        $this->db->join('inspection_master', "inspection_master.id = inspections.inspection");
        $this->db->join('projects', "projects.id = inspections.project");
        $this->db->where('inspections.id', $inspection);
        $res = $this->db->get('inspections');
        return $res;
    }

    public function getAllInspectionHistory($inspection) {
        $this->db->select('*');
        if ($inspection != '') {
            $this->db->where('inspection', $inspection);
        }
        $res = $this->db->get('inspection_history');
        return $res;
    }

    public function getInspectionStatus() {
        $this->db->select('*');
        $res = $this->db->get('inspection_status');
        return $res;
    }

    public function insertInspectionHistory() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        unset($data['project']);
        $this->db->insert('inspection_history', $data);
        if ($data['status'] == 1) {
            $this->updateCompleted($data['inspection']);
        }
        return $this->db->insert_id();
    }

    public function updateCompleted($inspection) {
        $this->db->set('completed_flag', 1);
        $this->db->where('id', $inspection);
        $res = $this->db->update('inspections');
        return $res;
    }

    public function getInspectionHistory($inspection = '') {
        $this->db->select('inspection_history.*');
        $this->db->select('inspection_status.name as status');
        if ($inspection != '') {
            $this->db->where('inspection', $inspection);
        }
        $this->db->join('inspection_status', 'inspection_history.status=inspection_status.id');
        $res = $this->db->get('inspection_history');
        return $res;
    }

    public function checkInspectionExist() {
        $data = $this->input->post();
        $this->db->select('id');
        $this->db->where('project', $data['project']);
        $this->db->where('inspection', $data['inspection']);
//        $this->db->where('milestone', $data['milestone']);
        $res = $this->db->get('inspections');
        if ($res->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getLastInspectionDate($inspection) {
        $this->db->select_max('date');
        $this->db->where('inspection', $inspection);
//        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $res = $this->db->get('inspection_history');
        $date = date("Y-m-d");
        foreach ($res->result() as $row) {
            $date = $row->date;
        }
        return $date;
    }

}
