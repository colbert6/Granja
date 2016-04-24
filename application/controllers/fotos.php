<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Fotos extends CI_Controller
    {
        
        public function index()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/fotos/index.php");
            $this->load->view("/layout/foother.php");
        }

        public function form()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/fotos/form.php");
            $this->load->view("/layout/foother.php");
        }

    }
 ?>