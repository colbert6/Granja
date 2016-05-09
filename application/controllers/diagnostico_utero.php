<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Diagnostico_utero extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='diagnostico_utero';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('diagnostico_utero_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }
        
        public function index()
        {
            $data['diagnostico_utero'] = $this->diagnostico_utero_model->select();

            $dato= array ( 'titulo'=> 'Lista de diagnostico de utero');
            
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/diagnostico_utero/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->diagnostico_utero_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("diagnostico_utero");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar diagnostico utero','action'=>  'diagnostico_utero/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/diagnostico_utero/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->diagnostico_utero_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("diagnostico_utero");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar diagnostico utero','action'=>  'diagnostico_utero/editar' );
                $idRaza=$this->uri-> segment(3);

                $data['diagnostico_utero']=$this->diagnostico_utero_model->selectId( $idRaza);

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/diagnostico_utero/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            
            $this->diagnostico_utero_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("diagnostico_utero");
            
            
        }
    }
 ?>

