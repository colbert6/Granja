<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Muerte extends CI_Controller
    { var $menu;
      var $tabla='muerte';
        function __construct(){
            parent::__construct();
            $this->load->model('muerte_model');
            $this->load->model('animales_model');
            $this->load->model('especificacion_muerte_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));

        }
        
        public function index()
        {
            $data['muerte'] = $this->muerte_model->select();

            $dato= array ( 'titulo'=> 'Lista de Muerte');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/muerte/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Muerte','action'=>  'muerte/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'espec_muerte'=> $this->input->post('espec_muerte'),
                           'fecha'=> $this->input->post('fecha')
                        );
          //   print_r($data);
             $this->muerte_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("muerte");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['especificacion_muerte'] = $this->especificacion_muerte_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/muerte/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'espec_muerte'=> $this->input->post('espec_muerte'),
                           'fecha'=> $this->input->post('fecha'));
                //print_r($data);
                $this->muerte_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("muerte");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Muerte','action'=>  'muerte/editar' );
                $idabo=$this->uri-> segment(3);

                $data['especificacion_muerte'] = $this->especificacion_muerte_model->select();
                $data['animales']=$this->animales_model->select();
                $data['muerte']=$this->muerte_model->selectId( $idabo);
                

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/muerte/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->muerte_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("muerte");
            
            
        }


    }
 ?>