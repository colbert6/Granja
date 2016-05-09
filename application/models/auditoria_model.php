<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Auditoria_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function registrar($data){
	       // print_r($datos);exit();

	       $sql=" INSERT INTO `auditoria`(`aud_tipo`, `aud_tabla`, `aud_fecha`, `aud_usuario`, `aud_descripcion`, `aud_host`, `aud_registro`) 
	       		VALUES ( '".$data['tipo']."','".$data['tabla']."',NOW(),". $this->session->userdata('tipo_usu').",'".$data['descripcion']."'
	       					,'".gethostname()."','".$data['registro']."' ) ";

	        $query=$this->db->query($sql); 
	       return $query;
	    }



	}

?>
