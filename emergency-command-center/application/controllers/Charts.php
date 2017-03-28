<?php

/**
 * Created by PhpStorm.
 * User: chamb
 * Date: 3/28/2017
 * Time: 8:25 PM
 */
class Charts extends CI_Controller{

    public function __construct()
    {
        parent::__construct();


        $this->load->library('session');
    }

    public function index(){
        $this->load->view('charts');
    }
}