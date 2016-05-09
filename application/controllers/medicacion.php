<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Medicacion extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('medicacion_model');
        }

        public function index()
        {
            $data['medicacion'] = $this->medicacion_model->select();
            $dato= array ( 'titulo'=> 'Lista de medicación');
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/medicacion/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'rp'=> $this->input->post('rp'),
                                'fecha_evento'=>$this->input->post('appaterno'),
                                'materno'=>$this->input->post('apmaterno'),
                                'direccion'=>$this->input->post('direccion'),
                                'telefono'=>$this->input->post('telefono'),
                                'distrito'=>$this->input->post('distrito'));
                print_r($data);exit();
                $this->personal_model->crear($data);
                $this->redireccionar("personal");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar medicacion','action'=>  'medicacion/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicacion/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }/*
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion'),
                                 );

                $resul=$this->personal_model->editar($data);
                $this->redireccionar("personal");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar personal','action'=>  'personal/editar' );
                $idTR=$this->uri-> segment(3);

                $data['personal']=$this->personal_model->selectId( $idTR);
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/personal/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function eliminar()
        {
            $idTR=$this->uri-> segment(3);
            $this->personal_model->eliminar($idTR);
            $this->redireccionar("personal"); 
        }*/
    }
 ?>