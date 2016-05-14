<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Servicio extends CI_Controller
    { var $menu;
       var $tabla='servicio';
        function __construct(){
            parent::__construct();
            $this->load->model('servicio_model');
            $this->load->model('animales_model');
            $this->load->model('personal_model');
            $this->load->model('tipo_servicio_model');
            $this->load->model('reproductor_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));

        }
        
        public function index()
        {
            $data['servicio'] = $this->servicio_model->select();

            $dato= array ( 'titulo'=> 'Lista de Servicio');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/servicio/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Servicio','action'=>  'servicio/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'animal'=> $this->input->post('animal'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'reproductor'=> $this->input->post('reproductor'),
                           'personal'=> $this->input->post('personal'),
                           'tipo_servicio'=> $this->input->post('tipo_servicio')
                        );
          //   print_r($data);
             $this->servicio_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("servicio");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['personal'] = $this->personal_model->select();
                $data['tipo_servicio'] = $this->tipo_servicio_model->select();
                $data['reproductor'] = $this->reproductor_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/servicio/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'animal'=> $this->input->post('animal'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'reproductor'=> $this->input->post('reproductor'),
                           'personal'=> $this->input->post('personal'),
                           'tipo_servicio'=> $this->input->post('tipo_servicio'));
                //print_r($data);
                $this->servicio_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("servicio");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Servicio','action'=>  'servicio/editar' );
                $idabo=$this->uri-> segment(3);

                $data['animales'] = $this->animales_model->select();
                $data['personal'] = $this->personal_model->select();
                $data['tipo_servicio'] = $this->tipo_servicio_model->select();
                $data['reproductor'] = $this->reproductor_model->select();
                $data['servicio']=$this->servicio_model->selectId( $idabo);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/servicio/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->servicio_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("servicio");
            
            
        }
        public function json_Nuevo(){
            $data= array ( 'animal'=> $_POST["animal"],
                           'fecha_evento'=> $_POST["fecha"],
                           'reproductor'=> $_POST["reproductor"],
                           'personal'=> $_POST["personal"],
                           'tipo_servicio'=> $_POST["tipo_servicio"]
                        );
            $servicio = $this->servicio_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($servicio->ser_id);
        }
        public function json_ExtraerTodo()
        {
            $data['servicio'] = $this->servicio_model->select();
            echo json_encode($data['servicio']->result());            
        }
        public function json_BuscarID(){
            $data['servicio']=$this->servicio_model->selectId($_POST["id"]);
            echo json_encode($data['servicio']->result());

        }
        public function json_Editar(){
            $data= array ( 'id'=> $_POST["id"],
                           'animal'=> $_POST["animal"],
                           'fecha_evento'=> $_POST["fecha"],
                           'reproductor'=> $_POST["reproductor"],
                           'personal'=> $_POST["personal"],
                           'tipo_servicio'=> $_POST["tipo_servicio"]
                        );
            $this->servicio_model->editar($data);
            $this->auditoria('modificar',$this->tabla,'', $data['id']);
        }

    }
 ?>