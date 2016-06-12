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
            $this->load->model('control_model');
            $this->load->model('servicio_model');
            $this->load->model('parto_model');
            $this->load->model('tipo_servicio_model');
            $this->load->model('reproductor_model');
            $this->load->model('tacto_rectal_model');
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
            $dato= array ( 'titulo'=> 'Reporte Calendario');

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
        public function controles()
        {
            
            $dato= array ( 'titulo'=> 'Reporte Controles (Semanal)');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/reporte/controles.php");
            $this->load->view("/reporte/foother1.php");
            
        }
        public function conteoTabla($año=''){
            $data['animales'] = $this->animales_model->select();
            $data['eventos'] = $this->eventos_model->selectYear($año);
            $data['simbolos'] = $this->simbolo_model->select();
            $this->load->view("/reporte/conteo_tabla.php",$data);
        }

        public function mostrarTablaReporte($fecha_inicio='',$fecha_fin=''){
            $data['animales'] = $this->animales_model->selectAnimalesParto();
            $data['control'] = $this->control_model->selectFechas($fecha_inicio,$fecha_fin);
            $data['fechas'] = array('inicio' => $fecha_inicio,'fin' => $fecha_fin);
            $this->load->view("/reporte/tabla_controles.php",$data);
        }
        public function produccion(){
            $data['produccion1'] = $this->animales_model->produccion1();
            $data['servicio'] = $this->servicio_model->select();
            $data['tipo_servicio'] = $this->tipo_servicio_model->select();
            $data['reproductor'] = $this->reproductor_model->select();
            $data['tacto_rectal'] = $this->tacto_rectal_model->select();
            $data['control'] = $this->control_model->select();
            

            $dato= array ( 'titulo'=> 'Reporte Produccion');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/reporte/produccion.php",$data);
            $this->load->view("/reporte/foother2.php");
        }
    }

?>