<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Analisis extends CI_Controller
    {
        var $menu;
        var $tabla='analisis';
        function __construct(){
            parent::__construct();
            $this->load->model('analisis_model');
            $this->load->model('animales_model');
            $this->load->model('resultado_analisis_model');
            $this->load->model('tipo_analisis_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['analisis'] = $this->analisis_model->select();
            $data['animales'] = $this->animales_model->select();
            $data['tipo_analisis'] = $this->tipo_analisis_model->select();
            $data['resultado_analisis'] = $this->resultado_analisis_model->select();

            $dato= array ( 'titulo'=> 'Lista de Analisis');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/analisis/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Analisis','action'=>  'analisis/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'animal'=> $this->input->post('animal'),
                           'tipana'=> $this->input->post('tipana'),
                           'fecha'=> $this->input->post('fecha'),
                           'resultado_ana'=> $this->input->post('resultado_ana')
                        );
          //   print_r($data);
             $this->analisis_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("analisis");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['tipo_analisis'] = $this->tipo_analisis_model->select();
                $data['resultado_analisis'] = $this->resultado_analisis_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/analisis/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'animal'=> $this->input->post('animal'),
                           'tipana'=> $this->input->post('tipana'),
                           'fecha'=> $this->input->post('fecha'),
                           'resultado_ana'=> $this->input->post('resultado_ana')
                           );
                //print_r($data);
                $this->analisis_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("analisis");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Analisis','action'=>  'analisis/editar' );
                $idabo=$this->uri-> segment(3);

               // $data['tipo_registro']=$this->tipo_registro_model->select();
                $data['animales']=$this->animales_model->select();
                $data['tipo_analisis'] = $this->tipo_analisis_model->select();
                $data['resultado_analisis'] = $this->resultado_analisis_model->select();
                $data['analisis']=$this->analisis_model->selectId( $idabo);
                //print_r($data);
               // $data['razas']=$this->razas_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/analisis/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->analisis_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("analisis");
            
            
        }

        public function json_Nuevo(){
            $data= array ( 'tipana'=> $_POST["tipana"],
                           'animal'=> $_POST["animal"],
                           'fecha'=> $_POST["fecha"],
                           'resultado_ana'=> $_POST["resultado_ana"]
                        );
            $analisis =$this->analisis_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($analisis->ana_id);

        }
        public function json_BuscarID(){
            $data['analisis']=$this->analisis_model->selectId($_POST["id"]);
            echo json_encode($data['analisis']->result());

        }
        public function json_Editar(){
            $data= array ( 'id'=> $_POST["id"],
                           'tipana'=> $_POST["tipana"],
                           'animal'=> $_POST["animal"],
                           'fecha'=> $_POST["fecha"],
                           'resultado_ana'=> $_POST["resultado_ana"]
                        );
            $this->analisis_model->editar($data);
            $this->auditoria('modificar',$this->tabla,'', $data['id']);
        }


    }
 ?>