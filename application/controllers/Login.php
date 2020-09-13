<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        //load google login library
        $this->load->library('googleplus');
        $this->load->model('Login_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required', 'Please enter Username');
        $this->form_validation->set_rules('password', 'Password', 'required', 'Please enter password');
        $username = $this->input->post('username');
        $passwd = $this->input->post('password');
        
        if($this->session->userdata('logged_in')){
            redirect('projects');
        }
        if (isset($_GET['code'])) {
            //authenticate user
            $this->googleplus->getAuthenticate();

            //get user info from google
            $gpInfo = $this->googleplus->getUserInfo();

            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $gpInfo['id'];
            $userData['name'] = $gpInfo['name'];
            $userData['first_name'] = $gpInfo['given_name'];
            $userData['last_name'] = $gpInfo['family_name'];
            $userData['email'] = $gpInfo['email'];
            $userData['gender'] = !empty($gpInfo['gender']) ? $gpInfo['gender'] : '';
            $userData['locale'] = !empty($gpInfo['locale']) ? $gpInfo['locale'] : '';
            $userData['profile_url'] = !empty($gpInfo['link']) ? $gpInfo['link'] : '';
            $userData['picture_url'] = !empty($gpInfo['picture']) ? $gpInfo['picture'] : '';
            $username = $userData['email'];
            //insert or update user data to the database
            if ($this->Login_model->isEmailRegistered($userData) != '') {

                $res = $this->Login_model->getUsertypeFromUsername($username);
                foreach ($res->result() as $row) {
                    $Utype = $row->uType;
                }
                $session_data = array(
                    'username' => $userData['email'],
                    'user_type' => $Utype,
                    'fullname' => $userData['name'],
                    'profilPicture' => $userData['picture_url'],
                    'logged_in' => TRUE,
                );

                $user_id = $this->Login_model->getUserIdFromUsername($username);
                
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata($session_data);
                $this->session->set_userdata('userData', $userData);
                redirect('projects');
            } else {
                $this->session->set_flashdata('loginMsg', '<div class="alert alert-danger" role="alert">This Email is not registered!</div>');
            }
            redirect('login');
        }

        //google login url
        $data['loginURL'] = $this->googleplus->loginURL();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/nav_menu', $data);
        $this->load->view('login', $data);
        $this->load->view('layout/footer');
    }

    public function validate_login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_username', 'Username', 'required', 'Please enter Username');
        $this->form_validation->set_rules('admin_password', 'Password', 'required', 'Please enter password');
        $usertype = 'admin';
        $username = $this->input->post('admin_username');
        $passwd = $this->input->post('admin_password');
        if ($this->form_validation->run()) {
            $this->load->model('Login_model');
            if ($this->Login_model->check_login($username, $passwd, $usertype)) {
                $res = $this->Login_model->getUsertypeFromUsername($username);
                foreach ($res->result() as $row) {
                    $Utype = $row->uType;
                }
                $session_data = array(
                    'username' => $username,
                    'fullname' => $username,
                    'user_type' => $Utype,
                    'logged_in' => TRUE,
                    'profilPicture' => base_url() . 'public/assets/images/default_profile.jpg',
                );

                $user_id = $this->Login_model->getUserIdFromUsername($username);

                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata($session_data);
                redirect('projects');
            } else {
                $this->session->set_flashdata('loginMsg', '<div class="alert alert-danger" role="alert">Invalid login details!</div>');
                redirect('login');
            }
        }else{
            redirect('login');
        }
    }
    
    function setUserSession(){
        
    }

    public function logout() {
        $log_array = array('username', 'user_type');
        $this->session->unset_userdata($log_array);
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('userData');
        $this->session->set_flashdata('success', 'Logged Out..');
        $this->session->sess_destroy();
        redirect('login');
    }

}
