<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tacto_rectal extends CI_Controller
    { var $menu;
      var $tabla='tacto_rectal';
        function __construct(){
            parent::__construct();
            $this->load->model('tacto_rectal_model');
            $this->load->model('animales_model');
            $this->load->model('enfermedad_ovario_model');
            $this->load->model('enfermedad_utero_model');
            $this->load->model('via_aplicacion_model');
            $this->load->model('medicina_genital_model');
            $this->load->model('diagnostico_utero_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['tacto_rectal'] = $this->tacto_rectal_model->select();
            $data['enfermedad_ovario'] = $this->enfermedad_ovario_model->select();
            $data['enfermedad_utero'] = $this->enfermedad_utero_model->select();
            $data['via_aplicacion'] = $this->via_aplicacion_model->select();
            $data['medicina_genital'] = $this->medicina_genital_model->select();
            $data['diagnostico_utero'] = $this->diagnostico_utero_model->select();

            $dato= array ( 'titulo'=> 'Lista de Tacto Rectal');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tacto_rectal/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Tacto Rectal','action'=>  'tacto_rectal/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'diag_utero'=> $this->input->post('diag_utero'),
                           'enfe_ovario'=> $this->input->post('enfe_ovario'),
                           'enfe_utero'=> $this->input->post('enfe_utero'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                           'med_genital'=> $this->input->post('med_genital')
                        );
          //   print_r($data);
             $this->tacto_rectal_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("tacto_rectal");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['enfermedad_ovario'] = $this->enfermedad_ovario_model->select();
                $data['enfermedad_utero'] = $this->enfermedad_utero_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();
                $data['medicina_genital'] = $this->medicina_genital_model->select();
                $data['diagnostico_utero'] = $this->diagnostico_utero_model->select();
                
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tacto_rectal/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'diag_utero'=> $this->input->post('diag_utero'),
                           'enfe_ovario'=> $this->input->post('enfe_ovario'),
                           'enfe_utero'=> $this->input->post('enfe_utero'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                           'med_genital'=> $this->input->post('med_genital'));
                //print_r($data);
                $this->tacto_rectal_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("tacto_rectal");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Tacto Rectal','action'=>  'tacto_rectal/editar' );
                $idabo=$this->uri-> segment(3);

                $data['animales'] = $this->animales_model->select();
                $data['enfermedad_ovario'] = $this->enfermedad_ovario_model->select();
                $data['enfermedad_utero'] = $this->enfermedad_utero_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();
                $data['medicina_genital'] = $this->medicina_genital_model->select();
                $data['diagnostico_utero'] = $this->diagnostico_utero_model->select();
                $data['tacto_rectal']=$this->tacto_rectal_model->selectId( $idabo);
               

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tacto_rectal/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->tacto_rectal_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("tacto_rectal");
            
            
        }
       public function json_Nuevo(){

            $data= array ( 'rp'=> $_POST["rp"],
                           'fecha_evento'=> $_POST["fecha"],
                           'diag_utero'=> $_POST["diag_utero"],
                           'enfe_ovario'=> $_POST["enfe_ovario"],
                           'enfe_utero'=> $_POST["enfe_utero"],
                           'via_aplicacion'=> $_POST["via_aplicacion"],
                           'med_genital'=> $_POST["med_genital"]
                        );
            $tacto_recta =$this->tacto_rectal_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($tacto_recta->tarec_id);
        }
        public function json_BuscarID(){
            $data['tacto_rectal']=$this->tacto_rectal_model->selectId($_POST["id"]);
            echo json_encode($data['tacto_rectal']->result());

        }
        public function json_Editar(){
            $data= array ( 'id'=> $_POST["id"],
                           'rp'=> $_POST["rp"],
                           'fecha_evento'=> $_POST["fecha"],
                           'diag_utero'=> $_POST["diag_utero"],
                           'enfe_ovario'=> $_POST["enfe_ovario"],
                           'enfe_utero'=> $_POST["enfe_utero"],
                           'via_aplicacion'=> $_POST["via_aplicacion"],
                           'med_genital'=> $_POST["med_genital"]
                        );
            $this->tacto_rectal_model->editar($data);
            $this->auditoria('modificar',$this->tabla,'', $data['id']);
        }

    }
 ?>