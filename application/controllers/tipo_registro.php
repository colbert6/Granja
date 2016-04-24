<?php 

    /**
    * 
    */
    class Tipo_registro extends CI_Controller
    {
        
        public function index()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/tipo_registro/index.php");
            $this->load->view("/layout/foother.php");
        }

        public function form()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/tipo_registro/form.php");
            $this->load->view("/layout/foother.php");
        }

    }
 ?>