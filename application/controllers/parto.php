<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Parto extends CI_Controller
    { var $menu;
      var $tabla='parto';
        function __construct(){
            parent::__construct();
            $this->load->model('parto_model');
            $this->load->model('animales_model');
            $this->load->model('estado_cria_model');
            $this->load->model('tipo_parto_model');
            $this->load->model('servicio_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['parto'] = $this->parto_model->select();

            $dato= array ( 'titulo'=> 'Lista de Parto');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/parto/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {
            $dato= array ( 'titulo'=> 'Registrar Parto','action'=>  'parto/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'fechanac'=> $this->input->post('fechanac'),
                           'estado_cria'=> $this->input->post('estado_cria'),
                           'tipo_parto'=> $this->input->post('tipo_parto'),
                           'sexo_cria'=> $this->input->post('sexo_cria'),
                           'servicio'=> $this->input->post('servicio')
                        );
          //   print_r($data);
             $this->parto_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("parto");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['estado_cria'] = $this->estado_cria_model->select();
                $data['tipo_parto'] = $this->tipo_parto_model->select();
                $data['servicio'] = $this->servicio_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/parto/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'fechanac'=> $this->input->post('fechanac'),
                           'estado_cria'=> $this->input->post('estado_cria'),
                           'tipo_parto'=> $this->input->post('tipo_parto'),
                           'sexo_cria'=> $this->input->post('sexo_cria'),
                           'servicio'=> $this->input->post('servicio'));
                //print_r($data);
                $this->parto_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("parto");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Parto','action'=>  'parto/editar' );
                $idabo=$this->uri-> segment(3);

                $data['animales'] = $this->animales_model->select();
                $data['estado_cria'] = $this->estado_cria_model->select();
                $data['tipo_parto'] = $this->tipo_parto_model->select();
                $data['servicio'] = $this->servicio_model->select();
                $data['parto']=$this->parto_model->selectId( $idabo);
                

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/parto/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->parto_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("parto");
            
            
        }


    }
 ?>