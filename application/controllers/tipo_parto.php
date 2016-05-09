<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Tipo_parto extends CI_Controller
    {
        var $menu;//este copiar
        var $tabla='raza';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_parto_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }

        public function index()
        {
            $data['tipo_parto'] = $this->tipo_parto_model->select();
            $dato= array ( 'titulo'=> 'Lista de tipo de parto');
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/tipo_parto/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->tipo_parto_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("tipo_parto");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar tipo de parto','action'=>  'tipo_parto/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_parto/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion'),
                                 );

                $resul=$this->tipo_parto_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("tipo_parto");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo parto','action'=>  'tipo_parto/editar' );
                $idTR=$this->uri-> segment(3);

                $data['tipo_parto']=$this->tipo_parto_model->selectId( $idTR);
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/tipo_parto/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function eliminar()
        {
            $idTR=$this->uri-> segment(3);
            
            $this->tipo_parto_model->eliminar($idTR);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("tipo_parto"); 
        }
    }
 ?>