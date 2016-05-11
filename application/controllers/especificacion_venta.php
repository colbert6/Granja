<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Especificacion_venta extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='especificacion_venta';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('especificacion_venta_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['especificacion_venta'] = $this->especificacion_venta_model->select();

            $dato= array ( 'titulo'=> 'Lista de especificacion venta');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/especificacion_venta/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->especificacion_venta_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("especificacion_venta");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar especificacion venta','action'=>  'especificacion_venta/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/especificacion_venta/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->especificacion_venta_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("especificacion_venta");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar especificacion venta','action'=>  'especificacion_venta/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['especificacion_venta']=$this->especificacion_venta_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/especificacion_venta/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->especificacion_venta_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("especificacion_venta");
            
            
        }
        public function json_ExtraerTodo()
        {
            $data['especificacion_venta'] = $this->especificacion_venta_model->select();
            echo json_encode($data['especificacion_venta']->result());            
        }
    }
 ?>

