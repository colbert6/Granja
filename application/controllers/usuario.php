<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Usuario extends CI_Controller
    {
        var $menu;
        var $tabla='usuario';//auditoria
        
        function __construct(){
            parent::__construct();
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
            $this->load->model('usuario_model');
            $this->load->model('tipo_usuario_model');
            $this->load->model('personal_model');

        }

        public function index()
        {
            $data['usuario'] = $this->usuario_model->select();

            $dato= array ( 'titulo'=> 'Lista de Usuario');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/usuario/index.php",$data);            
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'nombre'=> $this->input->post('nombre'),
                              'password'=> $this->input->post('password'),
                              'tipo_usuario'=> $this->input->post('tipo_usuario'),
                              'personal'=> $this->input->post('personal')  );

                $this->usuario_model->crear($data);                  
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("usuario");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar Usuario','action'=>  'usuario/nuevo' );

                $data['tipo_usuario']=$this->tipo_usuario_model->select();
                $data['personal']=$this->personal_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/usuario/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                               'nombre'=> $this->input->post('nombre'),
                              'password'=> $this->input->post('password'),
                              'tipo_usuario'=> $_POST['tipo_usuario'],
                              'personal'=> $this->input->post('personal') );

                $this->usuario_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("usuario");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Usuario','action'=>  'usuario/editar' );
                $idusuario=$this->uri-> segment(3);

                $data['usuario']=$this->usuario_model->selectId( $idusuario);
                $data['tipo_usuario']=$this->tipo_usuario_model->select();
                $data['personal']=$this->personal_model->select();


                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/usuario/form.php",$data);
                $this->load->view("/layout/foother.php");
            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);            
            $this->usuario_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("usuario");
            
            
        }

   }
   
?>        