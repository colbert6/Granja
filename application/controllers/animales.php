<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Animales extends CI_Controller
    {
      var $menu;
      var $tabla='animal';
        function __construct(){
            parent::__construct();
            $this->load->model('animales_model');
            $this->load->model('razas_model');
            $this->load->model('tipo_registro_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['animales'] = $this->animales_model->select();

            $dato= array ( 'titulo'=> 'Lista de Animales');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/animales/index.php",$data);
            $this->load->view("/animales/foother.php");
        }
        public function form()
        {
            $resul['razas'] = $this->razas_model->select();
            $data = array('consulta'=> $resul);
            $this->load->view("/layout/header.php");
            $this->load->view("/animales/form.php",$resul);
            $this->load->view("/animales/foother.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Animales','action'=>  'animales/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'codigo'=> $this->input->post('codigo'),
                           'nombre'=> $this->input->post('nombre'),
                           'raza'=> $this->input->post('raza'),
                           'padre'=> $this->input->post('padre'),
                           'madre'=> $this->input->post('madre'),
                           'fechanac'=> $this->input->post('fechanac'),
                           'fechareg'=> $this->input->post('fechareg'),
                           'sexo'=> $this->input->post('sexo'),
                           'proveedor'=> $this->input->post('proveedor'),
                      //     'tiporeg'=> $this->input->post('tiporeg'),
                           'descripcion'=> $this->input->post('descripcion')
                        );

             $this->animales_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("animales");
                
            }else{

                $data['razas'] = $this->razas_model->select();
                $data['tipo_registro'] = $this->tipo_registro_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/animales/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'codigo'=> $this->input->post('codigo'),
                           'nombre'=> $this->input->post('nombre'),
                           'raza'=> $this->input->post('raza'),
                           'padre'=> $this->input->post('padre'),
                           'madre'=> $this->input->post('madre'),
                           'fechanac'=> $this->input->post('fechanac'),
                           'fechareg'=> $this->input->post('fechareg'),
                           'sexo'=> $this->input->post('sexo'),
                           'proveedor'=> $this->input->post('proveedor'),
                           'tiporeg'=> $this->input->post('tiporeg'),
                           'descripcion'=> $this->input->post('descripcion')
                           );
                //print_r($data);
                $this->animales_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("animales");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Animales','action'=>  'animales/editar' );
                $idani=$this->uri-> segment(3);

                $data['tipo_registro']=$this->tipo_registro_model->select();
                $data['animales']=$this->animales_model->selectId( $idani);
                $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/animales/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idani=$this->uri-> segment(3);
            
            $this->animales_model->eliminar($idani);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("animales");
            
            
        }


    }
 ?>