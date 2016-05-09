<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Personal extends CI_Controller
    {   
        var $menu;//este copiar
        var $tabla='personal';//auditoria
        function __construct(){
            parent::__construct();
            $this->load->model('personal_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));//este copiar
        }

        public function index()
        {
            $data['personal'] = $this->personal_model->select();
            $dato= array ( 'titulo'=> 'Lista de personal');
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/personal/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }
        
        public function nuevo()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'dni'=>$this->input->post('dni'),
                                'nombre'=> $this->input->post('nombre'),
                                'paterno'=>$this->input->post('appaterno'),
                                'materno'=>$this->input->post('apmaterno'),
                                'direccion'=>$this->input->post('direccion'),
                                'telefono'=>$this->input->post('telefono'),
                                'distrito'=>$this->input->post('distrito'));
                
                $this->personal_model->crear($data);
                $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());//auditoria
                $this->redireccionar("personal");
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar personal','action'=>  'personal/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/personal/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'dni'=>$this->input->post('dni'),
                                'nombre'=> $this->input->post('nombre'),
                                'paterno'=>$this->input->post('appaterno'),
                                'materno'=>$this->input->post('apmaterno'),
                                'direccion'=>$this->input->post('direccion'),
                                'telefono'=>$this->input->post('telefono'),
                                'distrito'=>$this->input->post('distrito')
                                 );
                $resul=$this->personal_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("personal");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar personal','action'=>  'personal/editar' );
                $idTR=$this->uri-> segment(3);

                $data['personal']=$this->personal_model->selectId( $idTR);
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/personal/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }
        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->personal_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("personal"); 
        }
    }
 ?>