<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Calendario extends CI_Controller
    {
        
        public function index()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/calendario/index.php");
            $this->load->view("/calendario/foother.php");
            
        }

    }

?>