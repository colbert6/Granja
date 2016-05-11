<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Reproductor extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='reproductor';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('reproductor_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['reproductor'] = $this->reproductor_model->select();

            $dato= array ( 'titulo'=> 'Lista de reproductores');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/reproductor/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->reproductor_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("reproductor");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar reproductor','action'=>  'reproductor/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/reproductor/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->reproductor_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("reproductor");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar reproductor','action'=>  'reproductor/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['reproductor']=$this->reproductor_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/reproductor/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->reproductor_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("reproductor");
            
            
        }
        public function json_ExtraerTodo()
        {
            $data['reproductor'] = $this->reproductor_model->select();
            echo json_encode($data['reproductor']->result());            
        }
    }
 ?>

