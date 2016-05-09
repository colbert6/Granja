<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Medicina_genital extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='medicina_genital';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('medicina_genital_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['medicina_genital'] = $this->medicina_genital_model->select();

            $dato= array ( 'titulo'=> 'Lista de tipo servicio');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/medicina_genital/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->medicina_genital_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("medicina_genital");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar tipo de servicio','action'=>  'medicina_genital/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicina_genital/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->medicina_genital_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("medicina_genital");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo de enfermedad','action'=>  'medicina_genital/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['medicina_genital']=$this->medicina_genital_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicina_genital/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->medicina_genital_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("medicina_genital");
            
            
        }

        public function json_ExtraerTodo()
        {
            $data['medicina_genital'] = $this->medicina_genital_model->select();
            echo json_encode($data['medicina_genital']->result());            
        }
    }
 ?>

