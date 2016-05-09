<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tacto_rectal extends CI_Controller
    { var $menu;
        function __construct(){
            parent::__construct();
            $this->load->model('tacto_rectal_model');
            $this->load->model('animales_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['tacto_rectal'] = $this->tacto_rectal_model->select();

            $dato= array ( 'titulo'=> 'Lista de Tacto Rectal');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tacto_rectal/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Tacto Rectal','action'=>  'tacto_rectal/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'diag_utero'=> $this->input->post('diag_utero'),
                           'enfe_ovario'=> $this->input->post('enfe_ovario'),
                           'enfe_utero'=> $this->input->post('enfe_utero'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                           'med_genital'=> $this->input->post('med_genital')
                        );
          //   print_r($data);
             $this->tacto_rectal_model->crear($data);
             $this->redireccionar("tacto_rectal");
                
            }else{

                $data['animales'] = $this->animales_model->select();
             //   $data['aborto'] = $this->tipo_registro_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tacto_rectal/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'diag_utero'=> $this->input->post('diag_utero'),
                           'enfe_ovario'=> $this->input->post('enfe_ovario'),
                           'enfe_utero'=> $this->input->post('enfe_utero'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                           'med_genital'=> $this->input->post('med_genital'));
                //print_r($data);
                $this->tacto_rectal_model->editar($data);
                $this->redireccionar("tacto_rectal");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Tacto Rectal','action'=>  'tacto_rectal/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
               // $data['animales']=$this->animales_model->select();
                $data['tacto_rectal']=$this->tacto_rectal_model->selectId( $idabo);
                //print_r($data['indicaciones_especiale']);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tacto_rectal/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->tacto_rectal_model->eliminar($idabo);
            $this->redireccionar("tacto_rectal");
            
            
        }


    }
 ?>