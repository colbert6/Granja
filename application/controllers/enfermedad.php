<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Enfermedad extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('enfermedad_model');
            $this->load->model('animales_model');
        }
        
        public function index()
        {
            $data['enfermedad'] = $this->enfermedad_model->select();

            $dato= array ( 'titulo'=> 'Lista de Enfermedad');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/enfermedad/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Enfermedad','action'=>  'enfermedad/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'tipo_enfermedad'=> $this->input->post('tipo_enfermedad'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicamento'=> $this->input->post('medicamento'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion')
                        );
          //   print_r($data);
             $this->enfermedad_model->crear($data);
             $this->redireccionar("enfermedad");
                
            }else{

                $data['animales'] = $this->animales_model->select();
             //   $data['aborto'] = $this->tipo_registro_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'tipo_enfermedad'=> $this->input->post('tipo_enfermedad'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicamento'=> $this->input->post('medicamento'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                        );
                //print_r($data);
                $this->enfermedad_model->editar($data);
                $this->redireccionar("enfermedad");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Enfermedad','action'=>  'Enfermedad/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
               // $data['animales']=$this->animales_model->select();
                $data['enfermedad']=$this->enfermedad_model->selectId( $idabo);
                //print_r($data);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->enfermedad_model->eliminar($idabo);
            $this->redireccionar("enfermedad");
            
            
        }


    }
 ?>