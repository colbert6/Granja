<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Calendario extends CI_Controller
    {
        var $menu;

        function __construct(){
            parent::__construct();
            $this->load->model('animales_model');
            $this->load->model('eventos_model');
            $this->load->model('simbolo_model');
             $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
         }

        public function index()
        {
        
            $dato= array ( 'titulo'=> 'Registrar Evento');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/calendario/index.php");
            $this->load->view("/calendario/foother.php");
            
        }

        public function mostrarTabla($año=''){
            $data['animales'] = $this->animales_model->select();
            $data['eventos'] = $this->eventos_model->selectYear($año);
            $data['simbolos'] = $this->simbolo_model->select();
            $this->load->view("/calendario/tabla.php",$data);
        }

    }

?>