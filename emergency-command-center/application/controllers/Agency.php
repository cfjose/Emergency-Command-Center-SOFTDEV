<?php
/**
 * Created by PhpStorm.
 * User: chamb
 * Date: 3/28/2017
 * Time: 8:39 PM
 */
    class Agency extends CI_Controller{

        public function __construct()
        {
            parent::__construct();


            $this->load->library('session');
        }


        public function index(){
            $this->load->view('agency');
        }
    }
?>