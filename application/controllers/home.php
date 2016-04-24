<?php 

    /**
    * 
    */
    class Home extends CI_Controller
    {
        
        public function index()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("home");
            $this->load->view("/layout/foother.php");
        }

    }
 ?>