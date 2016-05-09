<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Celo extends CI_Controller
    {
      var $menu;
        function __construct(){
            parent::__construct();
            $this->load->model('celo_model');
            $this->load->model('animales_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['celo'] = $this->celo_model->select();

            $dato= array ( 'titulo'=> 'Lista de Animales en Celo');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/celo/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Celo','action'=>  'celo/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'causa_no_enseminal'=> $this->input->post('causa_no_enseminal'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicina_genital'=> $this->input->post('medicina_genital'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion')
                        );
          //   print_r($data);
             $this->celo_model->crear($data);
             $this->redireccionar("celo");
                
            }else{

                $data['animales'] = $this->animales_model->select();
             //   $data['aborto'] = $this->tipo_registro_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/celo/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'causa_no_enseminal'=> $this->input->post('causa_no_enseminal'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicina_genital'=> $this->input->post('medicina_genital'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion')
                        );
                //print_r($data);
                $this->celo_model->editar($data);
                $this->redireccionar("celo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Celo','action'=>  'celo/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
               // $data['animales']=$this->animales_model->select();
                $data['celo']=$this->celo_model->selectId( $idabo);
                //print_r($data);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/celo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->celo_model->eliminar($idabo);
            $this->redireccionar("celo");
            
            
        }


    }
 ?>