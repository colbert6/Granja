<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Parto extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('parto_model');
            $this->load->model('animales_model');
        }
        
        public function index()
        {
            $data['parto'] = $this->parto_model->select();

            $dato= array ( 'titulo'=> 'Lista de Parto');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/parto/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Parto','action'=>  'parto/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'fechanac'=> $this->input->post('fechanac'),
                           'estado_cria'=> $this->input->post('estado_cria'),
                           'tipo_parto'=> $this->input->post('tipo_parto'),
                           'sexo_cria'=> $this->input->post('sexo_cria'),
                           'servicio'=> $this->input->post('servicio')
                        );
          //   print_r($data);
             $this->parto_model->crear($data);
             $this->redireccionar("parto");
                
            }else{

                $data['animales'] = $this->animales_model->select();
             //   $data['aborto'] = $this->tipo_registro_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/parto/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'fechanac'=> $this->input->post('fechanac'),
                           'estado_cria'=> $this->input->post('estado_cria'),
                           'tipo_parto'=> $this->input->post('tipo_parto'),
                           'sexo_cria'=> $this->input->post('sexo_cria'),
                           'servicio'=> $this->input->post('servicio'));
                //print_r($data);
                $this->parto_model->editar($data);
                $this->redireccionar("parto");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Parto','action'=>  'parto/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
               // $data['animales']=$this->animales_model->select();
                $data['parto']=$this->parto_model->selectId( $idabo);
                //print_r($data['indicaciones_especiale']);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/parto/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->parto_model->eliminar($idabo);
            $this->redireccionar("parto");
            
            
        }


    }
 ?>