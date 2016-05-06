<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Permiso extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('permiso_model');
            $this->load->model('tipo_usuario_model');
            $this->load->model('modulo_model');
        }

        public function index()
        {
            $data['tipo_usuario'] = $this->tipo_usuario_model->select();

            $dato= array ( 'titulo'=> 'Otorgar de permisos');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/permiso/index.php",$data);            
            $this->load->view("/layout/foother_table.php");
        }


        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                               'descripcion'=> $this->input->post('descripcion'),
                               'padre'=> $this->input->post('padre'),
                               'url'=> $this->input->post('url'));

                $this->permiso_model->editar($data);
                $this->redireccionar("permiso");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar permiso','action'=>  'permiso/editar' );
                $idpermiso=$this->uri-> segment(3);
                
                $data['permiso']=$this->permiso_model->selectId( $idpermiso);
                $data['modulo'] = $this->modulo_model->selectPadre();


                //echo "<pre>";print_r($data['modulo']->result());
                //echo "<pre>";print_r($data['permiso']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/permiso/form.php",$data);
                $this->load->view("/layout/foother.php");
            }
            
        }

 

   }
   
?>        