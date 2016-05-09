<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Fotos extends CI_Controller
    {
        var $menu;
        public function index()
        {
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
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