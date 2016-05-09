<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Diagnostico_utero extends CI_Controller
    {   
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_analisis_model');
        }
        
        public function index()
        {
            $data['tipo_analisis'] = $this->tipo_analisis_model->select();

            $dato= array ( 'titulo'=> 'Lista de tipo analisis');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tipo_analisis/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_analisis_model->crear($data);
                $this->redireccionar("tipo_analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar tipo de analisis','action'=>  'tipo_analisis/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_analisis/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_analisis_model->editar($data);
                $this->redireccionar("tipo_analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo de enfermedad','action'=>  'tipo_analisis/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['tipo_analisis']=$this->tipo_analisis_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_analisis/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idRaza=$this->uri-> segment(3);
            
            $this->tipo_analisis_model->eliminar($idRaza);
            $this->redireccionar("tipo_analisis");
            
            
        }
    }
 ?>

