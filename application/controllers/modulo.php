<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Animales extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('animales_model');
            $this->load->model('razas_model');
            $this->load->model('tipo_registro_model');
        }


   }
   
?>        