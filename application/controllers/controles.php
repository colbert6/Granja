<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Controles extends CI_Controller
    {
      var $menu;
      var $tabla='controles';

        function __construct(){
            parent::__construct();
            $this->load->model('control_model');
            $this->load->model('animales_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $dato= array ( 'titulo'=> 'Lista de controles');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/controles/index.php");
            $this->load->view("/controles/foother_table.php");
        }
        
        public function json_Nuevo(){
            $data= array ( 'animal'=> $_POST["animal"],
                           'fecha'=> $_POST["fecha"],
                           'control_1'=> $_POST["control_1"],
                           'control_2'=> $_POST["control_2"]
                        );
            $control =$this->control_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($control->con_id);
        }

        public function json_Editar(){
            $data= array ( 'id' => $_POST["id"],
                           'animal'=> $_POST["animal"],
                           'fecha'=> $_POST["fecha"],
                           'control_1'=> $_POST["control_1"],
                           'control_2'=> $_POST["control_2"]
                        );
            $this->control_model->editar($data);
            $this->auditoria('editar',$this->tabla,'',$this->db->insert_id());
            
        }

        public function mostrarTabla($fecha='2016-05-23'){
            $data['animales'] = $this->animales_model->selectAnimalesParto();
            $data['control'] = $this->control_model->selectFecha($fecha);
            //echo "<pre>";print_r($data['animales']->result());print_r($data['control']->result());
            $this->load->view("/controles/tabla.php",$data);
        }

        



    }
 ?>