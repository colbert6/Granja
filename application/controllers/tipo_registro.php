<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tipo_registro extends CI_Controller
    { var $menu;
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_registro_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }

        public function index()
        {
            $dato= array ( 'titulo'=> 'Lista de Tipo de Registro');
            $data['tipo_registro'] = $this->tipo_registro_model->select();

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tipo_registro/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Lista de Tipo de Registro','action'=>  'tipo_registro/nuevo' );

            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion') );

                $this->tipo_registro_model->crear($data);
                $this->redireccionar("tipo_registro");
                
            }else{

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_registro/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                 );

                $this->tipo_registro_model->editar($data);
                $this->redireccionar("tipo_registro");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Tipo Registro','action'=>  'tipo_registro/editar' );
                $idTR=$this->uri-> segment(3);

                $data['tipo_registro']=$this->tipo_registro_model->selectId( $idTR);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_registro/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idTR=$this->uri-> segment(3);
            
            $this->tipo_registro_model->eliminar($idTR);
            $this->redireccionar("tipo_registro");
            
            
        }



    }
 ?>