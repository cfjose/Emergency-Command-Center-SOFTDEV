<?php

class Logout extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
        $sess_array = array('username' => '');
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->load->view('login');
    }
}

?>