<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tipo_registro extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_registro_model');
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


    }
 ?>