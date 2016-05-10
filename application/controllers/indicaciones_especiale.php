<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Indicaciones_especiale extends CI_Controller
    { 
        var $menu;
        var $tabla='indicaciones_especiale';
        function __construct(){
            parent::__construct();
            $this->load->model('indicaciones_especiale_model');
            $this->load->model('animales_model');
            $this->load->model('indicacion_especial_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['indicaciones_especiale'] = $this->indicaciones_especiale_model->select();

            $dato= array ( 'titulo'=> 'Lista de Indicaciones_especiale');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/indicaciones_especiale/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Indicaciones Especiale','action'=>  'indicaciones_especiale/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'indicaciones_esp'=> $this->input->post('indicaciones_esp'),
                           'fecha'=> $this->input->post('fecha')
                        );
          //   print_r($data);
             $this->indicaciones_especiale_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("indicaciones_especiale");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['indicacion_especial'] = $this->indicacion_especial_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/indicaciones_especiale/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'indicaciones_esp'=> $this->input->post('indicaciones_esp'),
                           'fecha'=> $this->input->post('fecha')
                        );
                //print_r($data);
                $this->indicaciones_especiale_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("indicaciones_especiale");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Indicaciones Especiale','action'=>  'indicaciones_especiale/editar' );
                $idabo=$this->uri-> segment(3);

                $data['indicacion_especial']=$this->indicacion_especial_model->select();
                $data['animales']=$this->animales_model->select();
                $data['indicaciones_especiale']=$this->indicaciones_especiale_model->selectId( $idabo);
                

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/indicaciones_especiale/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->indicaciones_especiale_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("indicaciones_especiale");
            
            
        }
		
		public function json_Nuevo(){
            $data= array ( 'rp'=> $_POST["rp"],
                           'indicaciones_esp'=> $_POST["indicaciones_esp"],
                           'fecha'=> $_POST["fecha"]
                        );
            $indicaciones_especiale =$this->indicaciones_especiale_model->crear($data);
            echo json_encode($indicaciones_especiale->indes_id);

        }

       


    }
 ?>