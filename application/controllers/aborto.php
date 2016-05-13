<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Aborto extends CI_Controller
    {
        var $menu;
        var $tabla='aborto';
        function __construct(){
            parent::__construct();
            $this->load->model('aborto_model');
            $this->load->model('animales_model');
            $this->load->model('causa_aborto_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
          //  $this->load->model('razas_model');
          //  $this->load->model('tipo_registro_model');
        }
        
        public function index()
        {
            $data['aborto'] = $this->aborto_model->select();

            $dato= array ( 'titulo'=> 'Lista de Abortos');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/aborto/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
   //     public function form()
   //     {
   //         $resul['animales'] = $this->animales_model->select();
   //         $data = array('consulta'=> $resul);
   //         $this->load->view("/layout/header.php");
   //         $this->load->view("/aborto/form.php",$resul);
   //         $this->load->view("/layout/foother_table.php");
   //     }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Abortos','action'=>  'aborto/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'animal'=> $this->input->post('animal'),
                           'cauabor'=> $this->input->post('cauabor'),
                           'fecha'=> $this->input->post('fecha')
                        );
          //   print_r($data);
             $this->aborto_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("aborto");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['causa_aborto'] = $this->causa_aborto_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/aborto/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'animal'=> $this->input->post('animal'),
                           'cauabor'=> $this->input->post('cauabor'),
                           'fecha'=> $this->input->post('fecha')
                           );
                //print_r($data);
                $this->aborto_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("aborto");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Aborto','action'=>  'aborto/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
                $data['animales']=$this->animales_model->select();
                $data['causa_aborto'] = $this->causa_aborto_model->select();
                $data['aborto']=$this->aborto_model->selectId( $idabo);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/aborto/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->aborto_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("aborto");
            
            
        }

        public function json_Nuevo(){
            $data= array ( 'animal'=> $_POST["animal"],
                           'cauabor'=> $_POST["cauabor"],
                           'fecha'=> $_POST["fecha"]
                        );
            $aborto =$this->aborto_model->crear($data);
            echo json_encode($aborto->ab_id);

        }
        public function json_Editar(){
            $data= array ( 'id'=> $_POST["id"],
                           'animal'=> $_POST["animal"],
                           'cauabor'=> $_POST["cauabor"],
                           'fecha'=> $_POST["fecha"]
                        );
            $aborto =$this->aborto_model->crear($data);
            echo json_encode($aborto->ab_id);

        }
        public function json_BuscarID(){

            $data['aborto']=$this->aborto_model->selectId($_POST["id"]);
            echo json_encode($data['aborto']->result());

        }





    }
 ?>