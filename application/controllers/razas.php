<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Razas extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('razas_model');
        }
        
        public function index()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/razas/index.php");
            $this->load->view("/layout/foother.php");
        }

        public function form()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/razas/form.php");
            $this->load->view("/layout/foother.php");
        }

        public function nuevo()
        {
            $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                           'abreviacion'=> $this->input->post('abreviacion')
                );

            $this->razas_model->crearAnimal($data);

            $this->load->view("/layout/header.php");
            $this->load->view("home");
            $this->load->view("/layout/foother.php");
        }

    }
 ?>