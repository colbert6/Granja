<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Via_aplicacion extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='via_aplicacion';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('via_aplicacion_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['via_aplicacion'] = $this->via_aplicacion_model->select();

            $dato= array ( 'titulo'=> 'Lista via de aplicacion');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/via_aplicacion/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->via_aplicacion_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("via_aplicacion");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar via de aplicacion','action'=>  'via_aplicacion/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/via_aplicacion/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->via_aplicacion_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("via_aplicacion");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar via de aplicacion','action'=>  'via_aplicacion/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['via_aplicacion']=$this->via_aplicacion_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/via_aplicacion/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->via_aplicacion_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("via_aplicacion");
        }

        public function json_ExtraerTodo()
        {
            $data['via_aplicacion'] = $this->via_aplicacion_model->select();
            echo json_encode($data['via_aplicacion']->result());            
        }
    }
 ?>

