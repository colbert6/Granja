<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Causa_aborto extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='causa_aborto';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('causa_aborto_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['causa_aborto'] = $this->causa_aborto_model->select();

            $dato= array ( 'titulo'=> 'Lista de causa aborto');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/causa_aborto/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->causa_aborto_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("causa_aborto");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar causa aborto','action'=>  'causa_aborto/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/causa_aborto/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->causa_aborto_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("causa_aborto");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar causa aborto','action'=>  'causa_aborto/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['causa_aborto']=$this->causa_aborto_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/causa_aborto/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->causa_aborto_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("causa_aborto");
            
            
        }

        public function json_ExtraerTodo()
        {
            $data['causa_aborto'] = $this->causa_aborto_model->select();
            echo json_encode($data['causa_aborto']->result());            
        }
    }
 ?>

