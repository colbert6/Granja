<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Medicamentos extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='medicamentos';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('medicamentos_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['medicamentos'] = $this->medicamentos_model->select();

            $dato= array ( 'titulo'=> 'Lista de medicamentos');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/medicamentos/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->medicamentos_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("medicamentos");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar medicamentos','action'=>  'medicamentos/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicamentos/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->medicamentos_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("medicamentos");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar medicamentos','action'=>  'medicamentos/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['medicamentos']=$this->medicamentos_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicamentos/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->medicamentos_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("medicamentos");
            
            
        }

        public function json_ExtraerTodo()
        {
            $data['medicamentos'] = $this->medicamentos_model->select();
            echo json_encode($data['medicamentos']->result());            
        }
    }
 ?>

