<?php

/**
 * Created by PhpStorm.
 * User: chamb
 * Date: 12/4/2016
 * Time: 4:22 PM
 */
class Signup extends CI_Controller
{
    public function __construct(){

        parent::__construct();

        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('security');

        $this->load->library('form_validation');

        $this->load->library('session');

        $this->load->model('user');

    }

    public function index(){
        $this->load->view('signup');
    }
}