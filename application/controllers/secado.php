<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Secado extends CI_Controller
    { var $menu;
      var $tabla='secado';
        function __construct(){
            parent::__construct();
            $this->load->model('secado_model');
            $this->load->model('animales_model');
            $this->load->model('medicina_cuarto_mamarios_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['secado'] = $this->secado_model->select();

            $dato= array ( 'titulo'=> 'Lista de Secado');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/secado/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Secado','action'=>  'secado/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'cuarto_mamarios'=> $this->input->post('cuarto_mamarios')
                            );
          //   print_r($data);
             $this->secado_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("secado");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['medicina_cuarto_mamarios'] = $this->medicina_cuarto_mamarios_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/secado/form.php",$data  );
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
                           'cuarto_mamarios'=> $this->input->post('cuarto_mamarios')
                            );
                //print_r($data);
                $this->secado_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("secado");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Secado','action'=>  'secado/editar' );
                $idabo=$this->uri-> segment(3);

                $data['medicina_cuarto_mamarios'] = $this->medicina_cuarto_mamarios_model->select();
                $data['animales']=$this->animales_model->select();
                $data['secado']=$this->secado_model->selectId( $idabo);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/secado/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->secado_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("secado");
            
            
        }
        public function json_Nuevo(){
            $data= array ( 'rp'=> $_POST["rp"],
                           'fecha_evento'=> $_POST["fecha"],
                           'cuarto_mamarios'=> $_POST["cuarto_mamarios"]
                        );
            $secado =$this->secado_model->crear($data);
            echo json_encode($secado->sec_id);
        }
        public function json_BuscarID(){
            $data['secado']=$this->secado_model->selectId($_POST["id"]);
            echo json_encode($data['secado']->result());

        }

    }
 ?>