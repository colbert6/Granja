<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Home extends CI_Controller
    {
        var $menu;

        public function index()
        {   

            //$this->session->sess_destroy();
            if($this->session->userdata('login')){

                $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));

                $this->load->view("/layout/header.php");
                $this->load->view("home");
                $this->load->view("/layout/foother.php");

            }else{

                $this->load->view("/login/index.php");
            
            }
            
            
        }

    }
 ?>