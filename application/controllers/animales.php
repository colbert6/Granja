<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Animales extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('animales_model');
        }
        
        public function index()
        {
            $data['animal'] = $this->animales_model->select();
            $this->load->view("/layout/header.php");
            $this->load->view("/animales/index.php");
            $this->load->view("/animales/foother.php");
        }

        public function form()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/animales/form.php");
            $this->load->view("/layout/foother.php");
        }

        public function nuevo()
        {
            $data= array ( 'codigo'=> $this->input->post('codigo'),
                           'nombre'=> $this->input->post('nombre'),
                           'padre'=> $this->input->post('padre'),
                           'madre'=> $this->input->post('madre'),
                           'fechanac'=> $this->input->post('fechanac'),
                           'fechareg'=> $this->input->post('fechareg'),
                           'sexo'=> $this->input->post('sexo'),
                           'proveedor'=> $this->input->post('proveedor'),
                           'tiporeg'=> $this->input->post('tiporeg'),
                           'descripcion'=> $this->input->post('descripcion')
                        );
           // print_r($data);

            $this->animales_model->crear($data);
    
            $this->load->view("/layout/header.php");
            $this->load->view("/animales/index.php");
            $this->load->view("/layout/foother.php");
        }


    }
 ?>