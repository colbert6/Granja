<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Causa_rechazo extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='causa_rechazo';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('causa_rechazo_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['causa_rechazo'] = $this->causa_rechazo_model->select();

            $dato= array ( 'titulo'=> 'Lista de causa rechazo');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/causa_rechazo/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->causa_rechazo_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("causa_rechazo");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar causa rechazo','action'=>  'causa_rechazo/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/causa_rechazo/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->causa_rechazo_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("causa_rechazo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar causa rechazo','action'=>  'causa_rechazo/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['causa_rechazo']=$this->causa_rechazo_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/causa_rechazo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->causa_rechazo_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("causa_rechazo");
            
            
        }
    }
 ?>

