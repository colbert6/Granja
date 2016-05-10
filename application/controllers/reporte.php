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

        public function calendario_original()
        {
            $data['animales'] = $this->animales_model->select();
            $data['eventos'] = $this->eventos_model->select();
            $data['simbolos'] = $this->simbolo_model->select();
            $dato= array ( 'titulo'=> 'Reporte');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/reporte/calendario_original.php",$data);
            $this->load->view("/reporte/foother.php");
            
        }

        public function calendario_conteo()
        {
            $data['animales'] = $this->animales_model->select();
            $data['eventos'] = $this->eventos_model->select();
            $data['simbolos'] = $this->simbolo_model->select();
            $dato= array ( 'titulo'=> 'Reporte');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/reporte/calendario_conteo.php",$data);
            $this->load->view("/reporte/foother.php");
            
        }

    }

?>