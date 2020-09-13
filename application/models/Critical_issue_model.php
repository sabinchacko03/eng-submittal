<?php

class Critical_issue_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function getAuthDeptByID($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->get('auth_depts');
        return $res;
    }

    public function getIssueSummary() {
        $userID = $this->session->userdata('user_id');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->select('critical_issue.project');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('critical_issue.issue_owner', $userID);
            $this->db->or_where('critical_issue.assignee', $userID);
        }
        $this->db->select('count(CASE WHEN critical_issue.status = 1 THEN critical_issue.status END) as total_open');
        $this->db->select('count(CASE WHEN critical_issue.status = 2 THEN critical_issue.status END) as total_assigned');
        $this->db->select('count(CASE WHEN critical_issue.status = 3 THEN critical_issue.status END) as total_completed');
        $this->db->select('count(CASE WHEN critical_issue.status = 4 THEN critical_issue.status END) as total_closed');
        $this->db->select('count(critical_issue.project) as total_issues');
        $this->db->join('projects', 'projects.id = critical_issue.project');
        $this->db->group_by('project');
        return $this->db->get('critical_issue');
    }

    public function getCriticalIssues($issue = '') {
        $this->db->select('critical_issue.*');
        $this->db->select('critical_issue.issue_owner as owner_id');
        $this->db->select('critical_issue.assignee as assignee_id');
        if ($issue != '') {
            $this->db->where('critical_issue.id', $issue);
        }
        $this->db->select('projects.name as project_name');
        $this->db->select('critical_issue_master.name as issue');
        $this->db->join('critical_issue_master', "critical_issue_master.id = critical_issue.issue");
        $this->db->join('projects', "projects.id = project");
        $this->db->select('departments.name as department');
        $this->db->join('departments', "departments.id = department");
        $this->db->select('issue_status.name as status');
        $this->db->join('issue_status', "issue_status.id = critical_issue.status");
        $this->db->select('users.username as issue_owner');
        $this->db->join('users', "users.id = critical_issue.issue_owner");
        $this->db->select('users1.username as assignee');
        $this->db->join('users as users1', "users1.id = critical_issue.assignee", 'left');
        $this->db->order_by('critical_issue.id', 'desc');
        $res = $this->db->get('critical_issue');
        return $res;
    }

    public function getCriticalIssuesByProject($project) {
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('critical_issue.issue_owner', $userID);
            $this->db->or_where('critical_issue.assignee', $userID);
        }
        $this->db->select('critical_issue.*');
        $this->db->where('critical_issue.project', $project);
        $this->db->select('projects.name as project_name');
        $this->db->select('critical_issue_master.name as issue');
        $this->db->join('critical_issue_master', "critical_issue_master.id = critical_issue.issue");
        $this->db->join('projects', "projects.id = project");
        $this->db->select('departments.name as department');
        $this->db->join('departments', "departments.id = department");
        $this->db->select('issue_status.name as status');
        $this->db->join('issue_status', "issue_status.id = critical_issue.status");
        $this->db->select('users.username as issue_owner');
        $this->db->join('users', "users.id = critical_issue.issue_owner");
        $this->db->select('users1.username as assignee');
        $this->db->join('users as users1', 'users1.id = critical_issue.assignee', 'left');
        $this->db->order_by('critical_issue.id', 'desc');
        $res = $this->db->get('critical_issue');
        return $res;
    }

    public function insertCriticalIssue() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['date_added'] = date('Y-m-d');
        if ($data['assignee'] != '') {
            $data['status'] = 2;
            $data['assigned_date'] = date('Y-m-d');
        }
        unset($data['submit']);
        $this->db->insert('critical_issue', $data);
        return $this->db->insert_id();
    }

    public function updateCriticalIssue() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        unset($data['project']);
        if ($data['status'] == 2) {
            $data['assigned_date'] = date('Y-m-d');
        } elseif ($data['status'] == 3) {
            $data['completed_date'] = date('Y-m-d');
        } elseif ($data['status'] == 4) {
            $data['closed_date'] = date('Y-m-d');
        }
        $this->db->where('id', $data['id']);
        return $this->db->update('critical_issue', $data);
    }

    public function getAllCriticalIssueStatus() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('issue_status');
        return $res;
    }

    public function getAllCriticalIssueMaster() {
        $this->db->select('*');
        $this->db->where('status', 1);
        $res = $this->db->get('critical_issue_master');
        return $res;
    }

    public function insertIssueMaster() {
        $data = $this->input->post();
        $data['added_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['added_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->insert('critical_issue_master', $data);
        return $this->db->insert_id();
    }

    public function checkIssueExistsOnDateForUser() {
        $data = $this->input->post();
        $this->db->select('id');
        $this->db->where('project', $data['project']);
        $this->db->where('department', $data['department']);
        $this->db->where('issue', $data['issue']);
        $this->db->where('open_date', $data['open_date']);
        $this->db->where('issue_owner', $data['issue_owner']);
        $res = $this->db->get('critical_issue');
        if ($res->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
