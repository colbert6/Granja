<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Caja extends CI_Controller
    {
        var $menu;
        var $tabla='caja';
        function __construct(){
            parent::__construct();
            $this->load->model('caja_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index()
        {
            $dato= array ( 'titulo'=> 'Libro de Caja');
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/caja/index.php");
            $this->load->view("/caja/foother.php");
        }

        public function ver_hoja($hoja=1,$saldo_ant=0){
          $data['caja'] = $this->caja_model->selectHoja($hoja);
          $data['saldo_anterior'] = $saldo_ant;
          $this->load->view("/caja/hoja.php",$data);
        }
  
        public function json_Nuevo(){
            $data= array ( 
                          'fecha' => $_POST["fecha"],
                           'cantidad' => $_POST['cantidad'],
                           'tipo' => $_POST['tipo'],
                           'estado' => $_POST['estado'],
                           'descripcion' => $_POST['descripcion'],
                           'ingreso' => $_POST['ingreso'],
                           'e_compra' => $_POST['e_compra'],
                           'e_medicina' => $_POST['e_medicina'],
                           'e_transporte' => $_POST['e_transporte'],
                           'hoja' => $_POST['hoja']
                        );
            $caja =$this->caja_model->crear($data);
            $this->auditoria('insertar',$this->tabla,'',$this->db->insert_id());
            echo json_encode($caja->caj_id);
        }
        public function json_Editar(){
            $data= array ( 'id' => $_POST["id"],
                          'fecha' => $_POST['fecha'],
                           'cantidad' => $_POST['cantidad'],
                           'tipo' => $_POST['tipo'],
                           'estado' => $_POST['estado'],
                           'descripcion' => $_POST['descripcion'],
                           'ingreso' => $_POST['ingreso'],
                           'e_compra' => $_POST['e_compra'],
                           'e_medicina' => $_POST['e_medicina'],
                           'e_transporte' => $_POST['e_transporte'],
                           'hoja' => $_POST['hoja']
                        );
            $this->caja_model->editar($data);
            $this->auditoria('editar',$this->tabla,'',$this->db->insert_id());
        }

    }
 ?>