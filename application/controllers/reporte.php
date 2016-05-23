<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Reporte extends CI_Controller
    {
        var $menu;

        function __construct(){
            parent::__construct();
            $this->load->model('animales_model');
            $this->load->model('eventos_model');
            $this->load->model('simbolo_model');
             $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
         }

        public function mostrarTabla($año=''){
            $data['animales'] = $this->animales_model->select();
            $data['eventos'] = $this->eventos_model->selectYear($año);
            $data['simbolos'] = $this->simbolo_model->select();
            $this->load->view("/reporte/tabla.php",$data);
        }
        

        public function calendario_original()
        {
            $dato= array ( 'titulo'=> 'Reporte');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/reporte/calendario_original.php");
            $this->load->view("/reporte/foother.php");
            
        }

        public function calendario_conteo()
        {
            
            $dato= array ( 'titulo'=> 'Reporte');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/reporte/calendario_conteo.php");
            $this->load->view("/reporte/foother1.php");
            
        }
        public function conteoTabla($año=''){
            $data['animales'] = $this->animales_model->select();
            $data['eventos'] = $this->eventos_model->selectYear($año);
            $data['simbolos'] = $this->simbolo_model->select();
            $this->load->view("/reporte/conteo_tabla.php",$data);
        }

    }

?>