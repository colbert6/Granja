<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tipo_enfermedad extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='tipo_enfermedad';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_enfermedad_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['tipo_enfermedad'] = $this->tipo_enfermedad_model->select();

            $dato= array ( 'titulo'=> 'Lista de tipo enfermdad');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tipo_enfermedad/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_enfermedad_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("tipo_enfermedad");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar tipo de enfermedad','action'=>  'Tipo_enfermedad/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_enfermedad/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_enfermedad_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("tipo_enfermedad");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo de enfermedad','action'=>  'tipo_enfermedad/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['tipo_enfermedad']=$this->tipo_enfermedad_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_enfermedad/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->tipo_enfermedad_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("tipo_enfermedad");
            
            
        }
    }
 ?>

