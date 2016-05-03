<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Modulo extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('modulo_model');
        }

        public function index()
        {
            $data['modulo'] = $this->modulo_model->select();

            $dato= array ( 'titulo'=> 'Lista de Modulos');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/modulo/index.php",$data);            
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'padre'=> $this->input->post('padre'),
                              'url'=> $this->input->post('url') );

                $this->modulo_model->crear($data);
                $this->redireccionar("modulo");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar modulo','action'=>  'modulo/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/modulo/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                               'descripcion'=> $this->input->post('descripcion'),
                              'padre'=> $this->input->post('padre'),
                              'url'=> $this->input->post('url'));

                $this->modulo_model->editar($data);
                $this->redireccionar("modulo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar modulo','action'=>  'modulo/editar' );
                $idmodulo=$this->uri-> segment(3);

                $data['modulo']=$this->modulo_model->selectId( $idmodulo);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/modulo/form.php",$data);
                $this->load->view("/layout/foother.php");
            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->modulo_model->eliminar($id);
            $this->redireccionar("modulo");
            
            
        }


   }
   
?>        