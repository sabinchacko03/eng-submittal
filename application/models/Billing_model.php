<?php

class Billing_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function getDeptVal($project) {
        $this->db->select('*');
        $this->db->where('id', $project);
        $res = $this->db->get('projects');
        return $res;
    }

    public function getBillingDetails($id = '') {
        $this->db->select('billing.*');
        if ($id != '') {
            $this->db->where('billing.id', $id);
        }
        $this->db->select('projects.name as project_name');
        $this->db->select('departments.name as dept_name');
        $this->db->join('projects', "projects.id = billing.project");
        $this->db->join('departments', "departments.id = billing.department");
        $res = $this->db->get('billing');
        return $res;
    }

    public function updateBilling() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['modified_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->where('id', $data['id']);
        return $this->db->update('billing', $data);
    }

    public function getAllBillingSummary() {
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('billing.*');
        $this->db->select_sum('billing.projected', 'projected');
        $this->db->select_sum('billing.actual', 'actual');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->select('projects.plumbing_total + projects.hvac_total + projects.electrical_total + projects.ff_total + projects.variation_plumbing + projects.variation_hvac + projects.variation_electrical + projects.variation_ff as project_value', FALSE);
        $this->db->join('projects', "projects.id = billing.project");
        $this->db->where('year', date('Y'));
        $this->db->where('billing.month <=', intval(ltrim(date('m'), '0')));
        $this->db->group_by("billing.project");
        $res = $this->db->get('billing');
        return $res;
    }

    public function getBillingDepartmentMonth($project, $department, $year, $month) {
        $this->db->select('*');
        $this->db->where('project', $project);
        $this->db->where('department', $department);
        $this->db->where('year', $year);
        $this->db->where('month', $month);
        $res = $this->db->get('billing');
        return $res;
    }

    public function getBillingDepartmentTotal($project, $department) {
        $this->db->select_sum('projected', 'projected_sum');
        $this->db->where('project', $project);
        $this->db->where('department', $department);
        $res = $this->db->get('billing');
        return $res;
    }

}
