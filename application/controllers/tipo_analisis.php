<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tipo_analisis extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='raza';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_analisis_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['tipo_analisis'] = $this->tipo_analisis_model->select();

            $dato= array ( 'titulo'=> 'Lista de tipo analisis');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tipo_analisis/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_analisis_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("tipo_analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar tipo de analisis','action'=>  'tipo_analisis/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_analisis/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_analisis_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("tipo_analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo de enfermedad','action'=>  'tipo_analisis/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['tipo_analisis']=$this->tipo_analisis_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_analisis/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idRaza=$this->uri-> segment(3);
            
            $this->tipo_analisis_model->eliminar($idRaza);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("tipo_analisis");
            
            
        }
        
        public function json_ExtraerTodo()
        {
            $data['tipo_analisis'] = $this->tipo_analisis_model->select();
            echo json_encode($data['tipo_analisis']->result());            
        }
    }
 ?>

