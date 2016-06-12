<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Enfermedad extends CI_Controller
    {
      var $menu;
      var $tabla='enfermedad';
        function __construct(){
            parent::__construct();
            $this->load->model('enfermedad_model');
            $this->load->model('animales_model');
            $this->load->model('tipo_enfermedad_model');
            $this->load->model('via_aplicacion_model');
            $this->load->model('medicamentos_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['enfermedad'] = $this->enfermedad_model->select();
            $data['tipo_enfermedad'] = $this->tipo_enfermedad_model->select();
            $data['via_aplicacion'] = $this->via_aplicacion_model->select();
            $data['medicamentos'] = $this->medicamentos_model->select();

            $dato= array ( 'titulo'=> 'Lista de Enfermedad');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/enfermedad/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
   //     public function form()
   //     {
   //         $resul['animales'] = $this->animales_model->select();
   //         $data = array('consulta'=> $resul);
   //         $this->load->view("/layout/header.php");
   //         $this->load->view("/aborto/form.php",$resul);
   //         $this->load->view("/layout/foother_table.php");
   //     }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Enfermedad','action'=>  'enfermedad/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'tipo_enfermedad'=> $this->input->post('tipo_enfermedad'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicamento'=> $this->input->post('medicamento'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion')
                        );
          //   print_r($data);
             $this->enfermedad_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("enfermedad");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['tipo_enfermedad'] = $this->tipo_enfermedad_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();
                $data['medicamentos'] = $this->medicamentos_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'tipo_enfermedad'=> $this->input->post('tipo_enfermedad'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicamento'=> $this->input->post('medicamento'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                        );
                //print_r($data);
                $this->enfermedad_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("enfermedad");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Enfermedad','action'=>  'Enfermedad/editar' );
                $idabo=$this->uri-> segment(3);

                $data['enfermedad']=$this->enfermedad_model->selectId( $idabo);
                $data['animales'] = $this->animales_model->select();
                $data['tipo_enfermedad'] = $this->tipo_enfermedad_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();
                $data['medicamentos'] = $this->medicamentos_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->enfermedad_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("enfermedad");
            
            
        }

        public function json_Nuevo(){
            $data= array ( 'rp'=> $_POST["rp"],
                           'tipo_enfermedad'=> $_POST["tipo_enfermedad"],
                           'fecha'=> $_POST["fecha"],
                           'medicamento'=> $_POST["medicamentos"],
                           'via_aplicacion'=> $_POST["via_aplicacion"]
                        );
            $enfermedad =$this->enfermedad_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($enfermedad->enf_id);

        }
        public function json_BuscarID(){
             $data['enfermedad']=$this->enfermedad_model->selectId($_POST["id"]);
            echo json_encode($data['enfermedad']->result());

        }
        public function json_Editar(){
            $data= array ( 'id'=> $_POST["id"],
                           'rp'=> $_POST["rp"],
                           'tipo_enfermedad'=> $_POST["tipo_enfermedad"],
                           'fecha'=> $_POST["fecha"],
                           'medicamento'=> $_POST["medicamentos"],
                           'via_aplicacion'=> $_POST["via_aplicacion"]
                        );
            $this->enfermedad_model->editar($data);
            $this->auditoria('modificar',$this->tabla,'', $data['id']);
        }


    }
 ?>