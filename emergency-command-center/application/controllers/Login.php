<?php

/**
 * Created by PhpStorm.
 * User: chamb
 * Date: 12/4/2016
 * Time: 4:21 PM
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('security');

        $this->load->library('form_validation');

        $this->load->library('session');

        $this->load->model('user');

    }

    public function index(){
        $this->load->view('login');
    }

    public function Authenticate(){
        $data = array('username' => $_POST['username'],
            'password' => MD5($_POST['password']));

        $result = $this->user->login($data);

        if($result == TRUE){
            $result = $this->user->read_user_information($data);

            if($result != FALSE){
                $session_data = array(
                    'username' => $result[0]->username,
                    'email' => $result[0]->email,
                    'lastname' => $result[0]->lastname,
                    'firstname' => $result[0]->firstname,
                );

                $this->session->set_userdata('logged_in', $session_data);
                header('location: ../main');
            }
        }else{
            $data = array('error_message' => 'Invalid Username or Password');
            $this->load->view('login', $data['error_message']);
        }
    }

    public function Signout(){
        $session_data = array('username' => '');
        $this->session->unset_userdata('logged_in', $session_data);
        $this->load->view('index');
    }
}