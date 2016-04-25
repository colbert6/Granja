<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Razas extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('razas_model');
        }
        
        public function index()
        {
            $data['razas'] = $this->razas_model->select();

            $dato= array ( 'titulo'=> 'Lista de Razas');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/razas/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->razas_model->crear($data);
                $this->redireccionar("razas");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar Raza','action'=>  'razas/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/razas/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->razas_model->editar($data);
                $this->redireccionar("razas");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Raza','action'=>  'razas/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['razas']=$this->razas_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/razas/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

    }
 ?>

