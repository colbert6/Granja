<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Rechazo extends CI_Controller
    { var $menu;
      var $tabla='rechazo';
        function __construct(){
            parent::__construct();
            $this->load->model('rechazo_model');
            $this->load->model('animales_model');
            $this->load->model('causa_rechazo_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['rechazo'] = $this->rechazo_model->select();

            $dato= array ( 'titulo'=> 'Lista de Rechazo');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/rechazo/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Rechazo','action'=>  'rechazo/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'fecha_evento'=> $this->input->post('fecha_evento'),
                           'causa_rechazo'=> $this->input->post('causa_rechazo')
                            );
          //   print_r($data);
             $this->rechazo_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("rechazo");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['causa_rechazo'] = $this->causa_rechazo_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/rechazo/form.php",$data  );
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
                           'causa_rechazo'=> $this->input->post('causa_rechazo')
                            );
                //print_r($data);
                $this->rechazo_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("rechazo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Rechazo','action'=>  'rechazo/editar' );
                $idabo=$this->uri-> segment(3);

                $data['animales']=$this->animales_model->select();
                $data['rechazo']=$this->rechazo_model->selectId( $idabo);
                $data['causa_rechazo']=$this->causa_rechazo_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/rechazo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->rechazo_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("rechazo");
            
            
        }

        public function json_Nuevo(){

            $data= array ( 
                           'rp'=> $_POST["rp"],
                           'fecha_evento'=> $_POST["fecha"],
                           'causa_rechazo'=> $_POST["causa_rechazo"]
                        );
            $rechazo =$this->rechazo_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($rechazo->recha_id);
        }
        public function json_BuscarID(){
            $data['rechazo']=$this->rechazo_model->selectId($_POST["id"]);
            echo json_encode($data['rechazo']->result());

        }
        public function json_Editar(){
            $data= array ( 'id'=> $_POST["id"],
                           'rp'=> $_POST["rp"],
                           'fecha_evento'=> $_POST["fecha"],
                           'causa_rechazo'=> $_POST["causa_rechazo"]
                        );
            $this->rechazo_model->editar($data);
            $this->auditoria('modificar',$this->tabla,'', $data['id']);
        }


    }
 ?>