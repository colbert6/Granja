<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tipo_servicio extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='tipo_servicio';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_servicio_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['tipo_servicio'] = $this->tipo_servicio_model->select();

            $dato= array ( 'titulo'=> 'Lista de tipo servicio');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tipo_servicio/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_servicio_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("tipo_servicio");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar tipo de servicio','action'=>  'tipo_servicio/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_servicio/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_servicio_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("tipo_servicio");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo de servicio','action'=>  'tipo_servicio/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['tipo_servicio']=$this->tipo_servicio_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_servicio/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->tipo_servicio_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("tipo_servicio");
            
            
        }
        public function json_ExtraerTodo()
        {
            $data['tipo_servicio'] = $this->tipo_servicio_model->select();
            echo json_encode($data['tipo_servicio']->result());            
        }
    }
 ?>

