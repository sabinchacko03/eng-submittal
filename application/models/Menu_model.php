<?php

class Menu_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function getMainMenu() {
        $this->db->select('*');
        $this->db->where('status', 1);
//        $this->db->where('link', '%#%');
        $this->db->where('parent', 0);
        $this->db->order_by('order_id');
        $res = $this->db->get('menu');
        return $res;
    }

    public function getSubMenu($menu) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('parent', $menu);
        $this->db->order_by('order_id');
        $res = $this->db->get('menu');
        return $res;
    }

    public function getMenuForUser() {
        $usertype = $this->Login_model->getUsertypeFromUserID($this->session->userdata('user_id'));
        $this->db->select('menu1.*');
        $this->db->join('permissions', 'permissions.menu = menu.id', 'left');
        $this->db->join('menu as menu1', 'menu1.id = menu.parent');
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->where('permissions.user_type', $usertype);
        }
        $this->db->order_by('menu1.order_id');
        $this->db->group_by('menu1.order_id');
        $res = $this->db->get('menu');
        return $res;
    }

    public function getSubmenuForUser($menu) {
        $usertype = $this->Login_model->getUsertypeFromUserID($this->session->userdata('user_id'));
        $this->db->select('menu.*');        
        $this->db->where('menu.status', 1);
        $this->db->where('menu.parent', $menu);
        
        if ($this->session->userdata('user_type') != 'admin') {
            $this->db->select('permissions.edit_role');
            $this->db->join('permissions', 'permissions.menu = menu.id');
            $this->db->where('permissions.user_type', $usertype);
        }else{
//            $this->db->group_by('permissions.menu');
        }
        $this->db->order_by('menu.order_id');
        $res = $this->db->get('menu');
        return $res;
    }

    public function getMenuIdFromLink($link) {
        $this->db->select('id');
        $this->db->like('link', $link);
        $res = $this->db->get('menu');
        foreach ($res->result() as $row) {
            return $row->id;
        }
    }

    public function getEditPermission($menu) {
        $user_type = $this->Login_model->getUsertypeFromUserID($this->session->userdata('user_id'));
        $this->db->select('edit_role');
        $this->db->where('menu', $menu);
        $this->db->where('user_type', $user_type);
        $this->db->where('edit_role', '1');
        $res = $this->db->get('permissions');
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDeletePermission($menu) {
        $user_type = $this->Login_model->getUsertypeFromUserID($this->session->userdata('user_id'));
        $this->db->select('delete_role');
        $this->db->where('menu', $menu);
        $this->db->where('user_type', $user_type);
        $this->db->where('delete_role', '1');
        $res = $this->db->get('permissions');
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
