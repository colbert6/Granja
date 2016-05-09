<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Resultado_analisis extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='resultado_analisis';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('resultado_analisis_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['resultado_analisis'] = $this->resultado_analisis_model->select();

            $dato= array ( 'titulo'=> 'Lista de resultado de analisis');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/resultado_analisis/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->resultado_analisis_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("resultado_analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar resltado de analisis','action'=>  'resultado_analisis/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/resultado_analisis/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->resultado_analisis_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("resultado_analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar resultado de analisis','action'=>  'resultado_analisis/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['resultado_analisis']=$this->resultado_analisis_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/resultado_analisis/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->resultado_analisis_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("resultado_analisis");
            
            
        }

        public function json_ExtraerTodo()
        {
            $data['resultado_analisis'] = $this->resultado_analisis_model->select();
            echo json_encode($data['resultado_analisis']->result());            
        }
    }
 ?>
