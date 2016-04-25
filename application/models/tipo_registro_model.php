<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tipo_registro_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	        $query=$this->db->get('tipo_registro');
	        return $query;
	        /*if($query->num_rows()>0)
	        	return $query;
	        else 
	        	return false;*/
	    }

	    function crear($data){
	        $this->db->insert('tipo_registro',array('tipreg_descripcion' => $data['descripcion'], 
	        										'tipreg_estado' => 1 ));
	    }

	}
?>