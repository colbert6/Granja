<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Usuario extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('usuario_model');
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
                $this->redireccionar("usuario");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar Usuario','action'=>  'usuario/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/usuario/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                               'nombre'=> $this->input->post('nombre'),
                              'password'=> $this->input->post('password'),
                              'tipo_usuario'=> $this->input->post('tipo_usuario'),
                              'personal'=> $this->input->post('personal') );

                $this->usuario_model->editar($data);
                $this->redireccionar("usuario");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Usuario','action'=>  'usuario/editar' );
                $idusuario=$this->uri-> segment(3);

                $data['usuario']=$this->usuario_model->selectId( $idusuario);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/usuario/form.php",$data);
                $this->load->view("/layout/foother.php");
            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->usuario_model->eliminar($id);
            $this->redireccionar("usuario");
            
            
        }

   }
   
?>        