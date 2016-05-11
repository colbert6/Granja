<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Eventos extends CI_Controller
    {
        var $menu;
        var $tabla='eventos';
        function __construct(){
            parent::__construct();
            $this->load->model('eventos_model');
            $this->menu = $this->modulo_model->selectMenu($this->session->userdata('tipo_usu'));
        }
        
        public function index(){}

        public function nuevo(){}

        public function editar(){}

        public function eliminar(){}

        public function json_Nuevo(){
            $data= array ( 
                           'id_tabla'=> $_POST["id_tabla"],
                           'sim_id'=> $_POST["sim_id"],
                           'ani_id'=> $_POST["ani_id"],
                           'eve_fecha'=> $_POST["eve_fecha"]
                        );
            $eventos_d = $this->eventos_model->crear($data);
            echo json_encode($eventos_d->eve_id);

        }
        public function json_BuscarID(){
            $data['evento']=$this->eventos_model->selectId($_POST["id"]);
            echo json_encode($data['evento']->result());
        }


    }
 ?>