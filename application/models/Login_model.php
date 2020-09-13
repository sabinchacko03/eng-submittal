<?php

class Login_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function check_login($username, $password) {
//        $type = $this->getUserTypeId($usertype);
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
//        $this->db->where('user_type', $type);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUserTypeId($type) {
        $this->db->select('id');
        $this->db->where('type', $type);
        $query = $this->db->get('user_type');
        foreach ($query->result() as $row) {
            return $row->id;
        }
    }

    public function getUserIdFromUsername($username) {
        $this->db->select('id');
        $this->db->where('username', $username);
        $this->db->or_where('email', $username); // Added after google authentication
        $query = $this->db->get('users');
        foreach ($query->result() as $row) {
            return $row->id;
        }
    }

    public function isEmailRegistered($data) {
        $this->db->select('id');
        $this->db->where('email', $data['email']);
        $query = $this->db->get('users');
        foreach ($query->result() as $row) {
            return $row->id;
        }
    }

    public function isUserAllowedEdit($user_id) {
        $this->db->select('user_type.edit');
        $this->db->select('users.*');
        $this->db->join('user_type', 'users.user_type = user_type.id');
        $this->db->where('user_type.edit', '1');
        $this->db->where('users.id', $user_id);
        $res = $this->db->get('users');
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsertypeFromUsername($username) {
        $this->db->select('users.*');
        $this->db->select('user_type.type as uType');
        $this->db->join('user_type', 'user_type.id = users.user_type');
        $this->db->where('users.username', $username);
        $this->db->or_where('users.email', $username);
        return $this->db->get('users');
    }

    public function getUsertypeFromUserID($user_id) {
        $this->db->select('user_type');
        $this->db->where('id', $user_id);
        $res =  $this->db->get('users');
        foreach($res->result() as $row){
            return $row->user_type;
        }
//        return $type;
    }

}
