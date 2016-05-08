<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Permiso extends CI_Controller
    {
        var $menu;
        
        function __construct(){
            parent::__construct();
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
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

                //echo "<pre>";print_r($_POST);exit();

                $this->permiso_model->QuitarPermiso($this->input->post('id_tipo'));
                foreach ($_POST['mod_permiso'] as $permiso) {
                    
                    $data= array ( 'id_tipo'=> $this->input->post('id_tipo'),
                                   'modulo'=> $permiso,
                                   'estado'=> 1);
                    $this->permiso_model->DarPermiso($data);
                }
                              
                $this->redireccionar("permiso");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar permisos','action'=>  'permiso/editar' );
                $idpermiso=$this->uri-> segment(3);
                
                $data['permiso']=$this->permiso_model->selectId( $idpermiso);
                $data['modulo'] = $this->modulo_model->selectPadre();
                $data['id_tipo'] =  $idpermiso;
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/permiso/form.php",$data);
                $this->load->view("/layout/foother.php");
            }
            
        }

 

   }
   
?>        