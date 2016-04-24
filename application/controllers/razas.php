<?php 

    /**
    * 
    */
    class Razas extends CI_Controller
    {
        
        public function index()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/razas/form.php");
            $this->load->view("/layout/foother.php");
        }

        public function form()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/razas/form.php");
            $this->load->view("/layout/foother.php");
        }

    }
 ?>