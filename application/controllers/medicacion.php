<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Medicacion extends CI_Controller
    { var $menu;
      var $tabla='medicacion';
        function __construct(){
            parent::__construct();
            $this->load->model('medicacion_model');
            $this->load->model('animales_model');
            $this->load->model('medicamentos_model');
            $this->load->model('via_aplicacion_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['medicacion'] = $this->medicacion_model->select();

            $dato= array ( 'titulo'=> 'Lista de Medicacion');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/medicacion/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Medicacion','action'=>  'medicacion/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'medicamentos'=> $this->input->post('medicamentos'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                           'fecha'=> $this->input->post('fecha')
                        );
          //   print_r($data);
             $this->medicacion_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("medicacion");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['medicamentos'] = $this->medicamentos_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicacion/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'medicamentos'=> $this->input->post('medicamentos'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion'),
                           'fecha'=> $this->input->post('fecha')
                        );
                //print_r($data);
                $this->medicacion_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("medicacion");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Medicacion','action'=>  'medicacion/editar' );
                $idabo=$this->uri-> segment(3);

               
                $data['animales']=$this->animales_model->select();
                $data['medicacion']=$this->medicacion_model->selectId( $idabo);
                $data['medicamentos'] = $this->medicamentos_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/medicacion/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->medicacion_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("medicacion");
            
            
        }
		
		public function json_Nuevo(){
            $data= array ( 'rp'=> $_POST["rp"],
                           'medicamentos'=> $_POST["medicamentos"],
						   'via_aplicacion'=> $_POST["via_aplicacion"],
                           'fecha'=> $_POST["fecha"]
                        );
            $medicacion =$this->medicacion_model->crear($data);
            echo json_encode($medicacion->med_id);

        }


    }
 ?>