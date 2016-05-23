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
            /*$this->load->model('medicina_genital_model');
            $this->load->model('via_aplicacion_model');
            $this->load->model('causa_no_inseminal_model');
            */
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['animales'] = $this->animales_model->selectAnimalesParto();
            $data['control'] = $this->control_model->select();

            //echo "<pre>";print_r($data['animales']->result());exit();
            $dato= array ( 'titulo'=> 'Lista de controles');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/controles/index.php",$data);
            $this->load->view("/controles/foother_table.php");
        }
   //     public function form()
   //     {
   //         $resul['animales'] = $this->animales_model->select();
   //         $data = array('consulta'=> $resul);
   //         $this->load->view("/layout/header.php");
   //         $this->load->view("/aborto/form.php",$resul);
   //         $this->load->view("/layout/foother_table.php");
   //     }
        
        public function json_Nuevo(){
            $data= array ( 'rp'=> $_POST["rp"],
                           'causa_no_enseminal'=> $_POST["cni"],
                           'fecha'=> $_POST["fecha"],
                           'medicina_genital'=> $_POST["medget"],
                           'via_aplicacion'=> $_POST["viaap"]
                        );
            $celo =$this->celo_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($celo->celo_id);
        }
    }
 ?>