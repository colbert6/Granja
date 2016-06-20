<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tiempo_parto extends CI_Controller
    {
      var $menu;
      var $tabla='tiempo_parto';
        function __construct(){
            parent::__construct();
            $this->load->model('tiempo_parto_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['tiempo_parto'] = $this->tiempo_parto_model->select();

            $dato= array ( 'titulo'=> 'Lista de Tiempo de Parto');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tiempo_parto/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'descripcion'=> $this->input->post('descripcion'),
	                       'cant'=> $this->input->post('cant'),
	                       'unidad'=> $this->input->post('unidad')
                        );
                //print_r($data);
                $this->tiempo_parto_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("tiempo_parto");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Tiempo de Parto','action'=>  'tiempo_parto/editar' );
                $idabo=$this->uri-> segment(3);
                
                $data['tiempo_parto']=$this->tiempo_parto_model->selectId( $idabo);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tiempo_parto/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }
    }