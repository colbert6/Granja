<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Celo extends CI_Controller
    {
      var $menu;
      var $tabla='celo';
        function __construct(){
            parent::__construct();
            $this->load->model('celo_model');
            $this->load->model('animales_model');
            $this->load->model('medicina_genital_model');
            $this->load->model('via_aplicacion_model');
            $this->load->model('causa_no_inseminal_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $data['celo'] = $this->celo_model->select();

            $dato= array ( 'titulo'=> 'Lista de Animales en Celo');

            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/celo/index.php",$data);
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
            $dato= array ( 'titulo'=> 'Registrar Celo','action'=>  'celo/nuevo' );

            
            if (@$_POST['guardar'] == 1) {
               $data= array ( 'rp'=> $this->input->post('rp'),
                           'causa_no_enseminal'=> $this->input->post('causa_no_enseminal'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicina_genital'=> $this->input->post('medicina_genital'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion')
                        );
          //   print_r($data);
             $this->celo_model->crear($data);
             $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
             $this->redireccionar("celo");
                
            }else{

                $data['animales'] = $this->animales_model->select();
                $data['medicina_genital'] = $this->medicina_genital_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();
                $data['causa_no_inseminal'] = $this->causa_no_inseminal_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/celo/form.php",$data  );
                $this->load->view("/layout/foother.php");

            }
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 
                           'id'=> $this->input->post('id'),
                           'rp'=> $this->input->post('rp'),
                           'causa_no_enseminal'=> $this->input->post('causa_no_enseminal'),
                           'fecha'=> $this->input->post('fecha'),
                           'medicina_genital'=> $this->input->post('medicina_genital'),
                           'via_aplicacion'=> $this->input->post('via_aplicacion')
                        );
                //print_r($data);
                $this->celo_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);
                $this->redireccionar("celo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Celo','action'=>  'celo/editar' );
                $idabo=$this->uri-> segment(3);

                $data['animales']=$this->animales_model->select();
                $data['celo']=$this->celo_model->selectId( $idabo);
                $data['medicina_genital'] = $this->medicina_genital_model->select();
                $data['via_aplicacion'] = $this->via_aplicacion_model->select();
                $data['causa_no_inseminal'] = $this->causa_no_inseminal_model->select();

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/celo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $idabo=$this->uri-> segment(3);
            
            $this->celo_model->eliminar($idabo);
            $this->auditoria('eliminar',$this->tabla,'', $id);
            $this->redireccionar("celo");
            
            
        }


    }
 ?>