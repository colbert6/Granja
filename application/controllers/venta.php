<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Venta extends CI_Controller
    {   var $menu;
      var $tabla='venta';
        function __construct(){
            parent::__construct();
            $this->load->model('venta_model');
            $this->load->model('animales_model');
            $this->load->model('especificacion_venta_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));

        }
        
        public function index()
        {
            $data['venta'] = $this->venta_model->select();
            $data['especificacion_venta'] = $this->especificacion_venta_model->select();

            $dato= array ( 'titulo'=> 'Lista de Venta');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/venta/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Venta','action'=>  'venta/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'especif_venta'=> $this->input->post('especif_venta')
                            );
          //   print_r($data);
             $this->venta_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("venta");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['especificacion_venta'] = $this->especificacion_venta_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/venta/form.php",$data  );
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
                           'especif_venta'=> $this->input->post('especif_venta'));
                //print_r($data);
                $this->venta_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("venta");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Venta','action'=>  'venta/editar' );
                $idabo=$this->uri-> segment(3);

                $data['animales'] = $this->animales_model->select();
                $data['especificacion_venta'] = $this->especificacion_venta_model->select();
                $data['venta']=$this->venta_model->selectId( $idabo);
                

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/venta/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->venta_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("venta");
            
            
        }
        public function json_Nuevo(){
            $data= array ( 'rp'=> $_POST["rp"],
                           'fecha_evento'=> $_POST["fecha"],
                           'especif_venta'=> $_POST["especif_venta"]
                        );
            $venta =$this->venta_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($venta->venta_id);
        }
        public function json_BuscarID(){
            $data['venta']=$this->venta_model->selectId($_POST["id"]);
            echo json_encode($data['venta']->result());

        }
        public function json_Editar(){
            $data= array ( 'id'=> $_POST["id"],
                           'rp'=> $_POST["rp"],
                           'fecha_evento'=> $_POST["fecha"],
                           'especif_venta'=> $_POST["especif_venta"]
                        );
            $this->venta_model->editar($data);
            $this->auditoria('modificar',$this->tabla,'', $data['id']);
        }

     
    }
 ?>