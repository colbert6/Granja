<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tipo_usuario extends CI_Controller
    {
        var $menu;
        var $tabla='tipo_usuario';//auditoria
        function __construct(){
            parent::__construct();
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
            $this->load->model('tipo_usuario_model');
            $this->load->model('modulo_model');
            $this->load->model('permiso_model');
        }

        public function index()
        {
            $data['tipo_usuario'] = $this->tipo_usuario_model->select();

            $dato= array ( 'titulo'=> 'Lista de Tipo usuario');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tipo_usuario/index.php",$data);            
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion')  );
                $new_tipo=$this->tipo_usuario_model->crear($data);               
                
                $this->auditoria('insertar',$this->tabla,'',$new_tipo->tipusu_id);//auditoria
                $modulos= $this->modulo_model->select();
                foreach ($modulos->result() as $modulo) {
                    $data= array (  'tipo_usuario'=>$new_tipo->tipusu_id ,
                                     'modulo'=>$modulo->mod_id,
                                     'estado'=>0);
                    $this->permiso_model->crear($data);
                   
                }
                $this->redireccionar("tipo_usuario");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar Tipo usuario','action'=>  'tipo_usuario/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_usuario/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                               'descripcion'=> $this->input->post('descripcion') );

                $this->tipo_usuario_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("tipo_usuario");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Tipo de usuario','action'=>  'tipo_usuario/editar' );
                $id=$this->uri-> segment(3);

                $data['tipo_usuario']=$this->tipo_usuario_model->selectId( $id);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_usuario/form.php",$data);
                $this->load->view("/layout/foother.php");
            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);            
            $this->tipo_usuario_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("tipo_usuario");
            
            
        }


   }
   
?>        