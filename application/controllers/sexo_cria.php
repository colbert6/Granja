<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Sexo_cria extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='sexo_cria';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('sexo_cria_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['sexo_cria'] = $this->sexo_cria_model->select();

            $dato= array ( 'titulo'=> 'Lista de sexo cria');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/sexo_cria/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ('codigo'=>$this->input->post('codigo'),
                            'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->sexo_cria_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("sexo_cria");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar sexo cria','action'=>  'sexo_cria/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/sexo_cria/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'codigo'=> $this->input->post('codigo'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->sexo_cria_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("sexo_cria");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar sexo cria','action'=>  'sexo_cria/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['sexo_cria']=$this->sexo_cria_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/sexo_cria/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->sexo_cria_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("sexo_cria");
            
            
        }
        public function json_ExtraerTodo()
        {
            $data['sexo_cria'] = $this->sexo_cria_model->select();
            echo json_encode($data['sexo_cria']->result());            
        }
    }
 ?>

