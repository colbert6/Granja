<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Medicina_cuarto_mamarios extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='medi_cuartos_mamarios';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('medicina_cuarto_mamarios_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['medicina_cuarto_mamarios'] = $this->medicina_cuarto_mamarios_model->select();

            $dato= array ( 'titulo'=> 'Lista de medicina cuarto mamarios');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/medicina_cuarto_mamarios/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->medicina_cuarto_mamarios_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("medicina_cuarto_mamarios");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar medicina cuarto mamarios','action'=>  'medicina_cuarto_mamarios/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicina_cuarto_mamarios/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->medicina_cuarto_mamarios_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("medicina_cuarto_mamarios");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar medicina cuarto mamarios','action'=>  'medicina_cuarto_mamarios/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['medicina_cuarto_mamarios']=$this->medicina_cuarto_mamarios_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicina_cuarto_mamarios/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->medicina_cuarto_mamarios_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("medicina_cuarto_mamarios");
            
            
        }
        public function json_ExtraerTodo()
        {
            $data['medicina_cuarto_mamarios'] = $this->medicina_cuarto_mamarios_model->select();
            echo json_encode($data['medicina_cuarto_mamarios']->result());            
        }
    }
 ?>

