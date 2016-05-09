<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Enfermedad_utero extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='enfermedad_utero';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('enfermedad_utero_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['enfermedad_utero'] = $this->enfermedad_utero_model->select();

            $dato= array ( 'titulo'=> 'Lista de enfermedad utero');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/enfermedad_utero/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->enfermedad_utero_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("enfermedad_utero");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar enfermedad de utero','action'=>  'enfermedad_utero/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad_utero/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->enfermedad_utero_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("enfermedad_utero");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar enfermedad utero','action'=>  'enfermedad_utero/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['enfermedad_utero']=$this->enfermedad_utero_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/enfermedad_utero/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->enfermedad_utero_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("enfermedad_utero");
            
            
        }
    }
 ?>

