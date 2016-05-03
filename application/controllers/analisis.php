<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Analisis extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('analisis_model');
            $this->load->model('animales_model');
        }
        
        public function index()
        {
            $data['analisis'] = $this->analisis_model->select();

            $dato= array ( 'titulo'=> 'Lista de Analisis');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/analisis/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
   //     public function form()
   //     {
   //         $resul['animales'] = $this->animales_model->select();
   //         $data = array('consulta'=> $resul);
   //         $this->load->view("/layout/header.php");
   //         $this->load->view("/aborto/form.php",$resul);
   //         $this->load->view("/layout/foother_table.php");
   //     }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Analisis','action'=>  'analisis/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'animal'=> $this->input->post('animal'),
                           'tipana'=> $this->input->post('tipana'),
                           'fecha'=> $this->input->post('fecha'),
                           'resultado_ana'=> $this->input->post('resultado_ana')
                        );
          //   print_r($data);
             $this->analisis_model->crear($data);
             $this->redireccionar("analisis");
                
            }else{

                $data['animales'] = $this->animales_model->select();
             //   $data['aborto'] = $this->tipo_registro_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/analisis/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'animal'=> $this->input->post('animal'),
                           'tipana'=> $this->input->post('tipana'),
                           'fecha'=> $this->input->post('fecha'),
                           'resultado_ana'=> $this->input->post('resultado_ana')
                           );
                //print_r($data);
                $this->analisis_model->editar($data);
                $this->redireccionar("analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Analisis','action'=>  'analisis/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
                $data['animales']=$this->animales_model->select();
                $data['analisis']=$this->analisis_model->selectId( $idabo);
                //print_r($data);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/analisis/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->analisis_model->eliminar($idabo);
            $this->redireccionar("analisis");
            
            
        }


    }
 ?>