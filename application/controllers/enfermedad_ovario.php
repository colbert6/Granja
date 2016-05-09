<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Enfermedad_ovario extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='raza';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('enfermedad_ovario_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['enfermedad_ovario'] = $this->enfermedad_ovario_model->select();

            $dato= array ( 'titulo'=> 'Lista de tipo servicio');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/enfermedad_ovario/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->enfermedad_ovario_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("enfermedad_ovario");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar tipo de servicio','action'=>  'enfermedad_ovario/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad_ovario/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->enfermedad_ovario_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("enfermedad_ovario");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar tipo de enfermedad','action'=>  'enfermedad_ovario/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['enfermedad_ovario']=$this->enfermedad_ovario_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad_ovario/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idRaza=$this->uri-> segment(3);
            
            $this->enfermedad_ovario_model->eliminar($idRaza);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("enfermedad_ovario");
            
            
        }
    }
 ?>

