<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Indicacion_especial extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='indicaciones_especiales';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('indicacion_especial_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['indicacion_especial'] = $this->indicacion_especial_model->select();

            $dato= array ( 'titulo'=> 'Lista de indicaciones especiales');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/indicacion_especial/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->indicacion_especial_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("indicacion_especial");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar indicacion especial','action'=>  'indicacion_especial/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/indicacion_especial/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->indicacion_especial_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("indicacion_especial");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar indicacion especial','action'=>  'indicacion_especial/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['indicacion_especial']=$this->indicacion_especial_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/indicacion_especial/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->indicacion_especial_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("indicacion_especial");
            
            
        }

         public function json_ExtraerTodo()
        {
            $data['indicacion_especial'] = $this->indicacion_especial_model->select();
            echo json_encode($data['indicacion_especial']->result());            
        }
    }
 ?>

