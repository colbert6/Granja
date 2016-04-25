<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Calendario extends CI_Controller
    {
        
        function __construct(){
            parent::__construct();
            $this->load->model('animales_model');
        }

        public function index()
        {
            $data['animales'] = $this->animales_model->select();
            $dato= array ( 'titulo'=> 'Registrar Evento');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/calendario/index.php",$data);
            $this->load->view("/calendario/foother.php");
            
        }

    }

?>