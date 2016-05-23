<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Simbolo extends CI_Controller
    { 
        var $menu;
        var $tabla='simbolo';
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


      /*  public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Simbolos','action'=>  'simbolo/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'animal'=> $this->input->post('animal'),
                           'cauabor'=> $this->input->post('cauabor'),
                           'fecha'=> $this->input->post('fecha')
                        );
             $this->aborto_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("simbolo");
                
            }else{

                $data['simbolo'] = $this->simbolo_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/simbolo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
        }*/

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'evento'=> $this->input->post('evento'),
                           'descripcion'=> $this->input->post('descripcion'),
                            'icono'=> $this->input->post('icono')
                           );
                
                $this->simbolo_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("simbolo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Simbolo','action'=>  'simbolo/editar' );
                $id=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
                $data['simbolo'] = $this->simbolo_model->selectId( $id);
                //
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/simbolo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->aborto_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("si");
            
            
        }

        public function json_BuscarID(){
            $data['simbolo']=$this->simbolo_model->selectId($_POST["id"]);
            echo json_encode($data['simbolo']->result());
        }
        public function json_ExtraerTodo(){
            $data['simbolos'] = $this->simbolo_model->select();
            echo json_encode($data['simbolos']->result());
        }

   }
   
?>        