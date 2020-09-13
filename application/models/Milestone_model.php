<?php

class Milestone_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function insertMilestoneMaster() {
        $data = $this->input->post();
        $data['added_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['added_date'] = date('Y-m-d');
        unset($data['submit']);
        $this->db->insert('milestones_master', $data);
        return $this->db->insert_id();
    }

    public function getAllMilestonesMaster() {
        $this->db->select('milestones_master.*');
        $this->db->select('users.username as user');
        $this->db->select('milestones_master_status.name as status');
        $this->db->join('users', "users.id = milestones_master.added_by");
        $this->db->join('milestones_master_status', "milestones_master_status.id = milestones_master.status");
        $this->db->where('milestones_master.status', 1);
        $res = $this->db->get('milestones_master');
        return $res;
    }

    public function getMilestones($project = '') {
        $userID = $this->session->userdata('user_id');
        $this->db->select('project_milestones.*');
        if ($project != '') {
            $this->db->where('project', $project);
        }
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.status as project_status');
        $this->db->select('milestones_master.name as milestone');
        $this->db->join('projects', "projects.id = project");
        $this->db->join('milestones_master', "milestones_master.id = milestone");
        $this->db->where('project_milestones.active_status', 1);
        $this->db->order_by('project_milestones.sequence');
        $res = $this->db->get('project_milestones');
        return $res;
    }

    public function getMilestonesByProjectGroup() {
        $userID = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('projects.id IN (SELECT project from user_projects WHERE user = ' . $userID . ')');
        }
        $this->db->select('project_milestones.*');
        $this->db->select('projects.name as project_name');
        $this->db->select('projects.project_id as project_id');
        $this->db->select('projects.status as project_status');
        $this->db->select('milestones_master.name as milestone');
        $this->db->join('projects', "projects.id = project");
        $this->db->join('milestones_master', "milestones_master.id = milestone");
        $this->db->where('project_milestones.active_status', 1);
        $this->db->group_by('project_milestones.project');
        $this->db->order_by('project_milestones.id', 'desc');
        $res = $this->db->get('project_milestones');
        return $res;
    }

    public function insertMilestone() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        $data['added_date'] = date('Y-m-d');
        unset($data['submit']);
        return $this->db->insert('project_milestones', $data);
    }

    public function getMilestonByID($milestone) {
        $this->db->select('project_milestones.*');
        if ($milestone != '') {
            $this->db->where('project_milestones.id', $milestone);
        }
        $this->db->select('projects.name as project_name');
        $this->db->select('milestones_master.name as milestone');
        $this->db->join('projects', "projects.id = project");
        $this->db->join('milestones_master', "milestones_master.id = milestone");
        $this->db->order_by('project_milestones.id', 'desc');
        $res = $this->db->get('project_milestones');
        return $res;
    }

    public function updateMilestone() {
        $data = $this->input->post();
        $data['modified_by'] = $this->Login_model->getUserIdFromUsername($this->session->username);
        unset($data['submit']);
        $this->db->set('actual_date', $data['actual_date']);
        $this->db->set('amended_date', $data['amended_date']);
        $this->db->where('id', $data['id']);
        return $this->db->update('project_milestones', $data);
    }

    public function deleteMilestone($milestone) {
        $this->db->set('active_status', 0);
        $this->db->set('modified_by', $this->Login_model->getUserIdFromUsername($this->session->username));
        $this->db->where('id', $milestone);
        return $this->db->update('project_milestones');
    }

    public function getMaxSequence($project) {
        $this->db->select_max('sequence', 'max');
        $this->db->where('project', $project);
        $this->db->where('active_status', 1);
        $query = $this->db->get('project_milestones');
        if ($query->num_rows() == 0) {
            return 1;
        }
        $max = $query->row()->max;
        return $max == 0 ? 1 : $max + 1;
    }

    public function getMilestonByIDProject($milestone, $project) {
        $this->db->select('*');
        $this->db->where('project', $project);
        $this->db->where('milestone', $milestone);
        $res = $this->db->get('project_milestones');
        return $res;
    }

    public function checkMilestoneMasterExists($milestoneName) {
        $this->db->select("*");
        $this->db->where('name', $milestoneName);
        $res = $this->db->get('milestones_master');
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
