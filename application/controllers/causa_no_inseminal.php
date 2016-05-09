<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Causa_no_inseminal extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='causa_no_inseminal';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('causa_no_inseminal_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['causa_no_inseminal'] = $this->causa_no_inseminal_model->select();

            $dato= array ( 'titulo'=> 'Lista de causa no inseminal');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/causa_no_inseminal/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->causa_no_inseminal_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("causa_no_inseminal");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar cusa no inseminal','action'=>  'causa_no_inseminal/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/causa_no_inseminal/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->causa_no_inseminal_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("causa_no_inseminal");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo de enfermedad','action'=>  'causa_no_inseminal/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['causa_no_inseminal']=$this->causa_no_inseminal_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/causa_no_inseminal/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->causa_no_inseminal_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("causa_no_inseminal");
            
            
        }

        public function json_ExtraerTodo()
        {
            $data['causa_no_inseminal'] = $this->causa_no_inseminal_model->select();
            echo json_encode($data['causa_no_inseminal']->result());            
        }
    }
 ?>

