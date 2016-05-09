<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Modulo extends CI_Controller
    {
         var $menu;
         var $tabla='modulo';//auditoria
        function __construct(){
            parent::__construct();
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
            $this->load->model('modulo_model');
            $this->load->model('tipo_usuario_model');
            $this->load->model('permiso_model');
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

                $new_tipo=$this->modulo_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$new_tipo->mod_id);//auditoria
                
                $tipo_usuario= $this->tipo_usuario_model->select();
                foreach ($tipo_usuario->result() as $tipo_usuarios) {
                    $data= array (  'tipo_usuario'=>$tipo_usuarios->tipusu_id ,
                                     'modulo'=>$new_tipo->mod_id ,
                                     'estado'=>0);
                    $this->permiso_model->crear($data);
                   
                }  

                $this->redireccionar("modulo");

            }else{
                $dato= array ( 'titulo'=> 'Registrar modulo','action'=>  'modulo/nuevo' );
                $data['mod_padre']=$this->modulo_model->selectPadre();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/modulo/form.php",$data);
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
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("modulo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar modulo','action'=>  'modulo/editar' );
                $idmodulo=$this->uri-> segment(3);

                $data['modulo']=$this->modulo_model->selectId( $idmodulo);
                $data['mod_padre']=$this->modulo_model->selectPadre();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/modulo/form.php",$data);
                $this->load->view("/layout/foother.php");
            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);            
            $this->modulo_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("modulo");
            
            
        }


   }
   
?>        