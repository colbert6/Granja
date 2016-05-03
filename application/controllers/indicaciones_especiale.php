<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Indicaciones_especiale extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('indicaciones_especiale_model');
            $this->load->model('animales_model');
        }
        
        public function index()
        {
            $data['indicaciones_especiale'] = $this->indicaciones_especiale_model->select();

            $dato= array ( 'titulo'=> 'Lista de Indicaciones_especiale');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/indicaciones_especiale/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Indicaciones Especiale','action'=>  'indicaciones_especiale/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'indicaciones_esp'=> $this->input->post('indicaciones_esp'),
                           'fecha'=> $this->input->post('fecha')
                        );
          //   print_r($data);
             $this->indicaciones_especiale_model->crear($data);
             $this->redireccionar("indicaciones_especiale");
                
            }else{

                $data['animales'] = $this->animales_model->select();
             //   $data['aborto'] = $this->tipo_registro_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/indicaciones_especiale/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'indicaciones_esp'=> $this->input->post('indicaciones_esp'),
                           'fecha'=> $this->input->post('fecha')
                        );
                //print_r($data);
                $this->indicaciones_especiale_model->editar($data);
                $this->redireccionar("indicaciones_especiale");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Indicaciones Especiale','action'=>  'indicaciones_especiale/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
               // $data['animales']=$this->animales_model->select();
                $data['indicaciones_especiale']=$this->indicaciones_especiale_model->selectId( $idabo);
                //print_r($data['indicaciones_especiale']);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/indicaciones_especiale/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->indicaciones_especiale_model->eliminar($idabo);
            $this->redireccionar("indicaciones_especiale");
            
            
        }


    }
 ?>