<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Simbolo extends CI_Controller
    { 
        var $menu;
        function __construct(){
            parent::__construct();
            $this->load->model('simbolo_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }

        public function index()
        {
            $data['simbolo'] = $this->simbolo_model->select();

            $dato= array ( 'titulo'=> 'Lista de Simbolos');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/simbolo/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }


        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Simbolos','action'=>  'simbolo/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'animal'=> $this->input->post('animal'),
                           'cauabor'=> $this->input->post('cauabor'),
                           'fecha'=> $this->input->post('fecha')
                        );
             $this->aborto_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("aborto");
                
            }else{

                $data['simbolo'] = $this->simbolo_model->select();

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
                $id=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
                $data['simbolo'] = $this->simbolo_model->selectId( $id);
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

        public function json_BuscarID(){
            $data['simbolo']=$this->simbolo_model->selectId($_POST["id"]);
            echo json_encode($data['simbolo']->result());
        }

   }
   
?>        