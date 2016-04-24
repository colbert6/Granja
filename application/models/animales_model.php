<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Animales_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	        $query=$this->db->get('animal');
	        if($query->num_rows()>0)
	        	return $query;
	        else 
	        	return false;
	    }

	    function crear($data){
	    	print_r($data);
	        $this->db->insert('animal',array('ani_rp' => $data['codigo'],
	        							   'ani_nombre' => $data['nombre'],
	        							   'ani_padre' => $data['padre'],
	                                       'ani_madre' => $data['madre'],			
	                                       'ani_fechanac' => $data['fechanac'],
	                                       'ani_fechareg' => $data['fechareg'],
	                                       'ani_sexo' => $data['sexo'],
	                                       'ani_proveedor' => $data['proveedor'],
	                                       'ani_tiporeg' => $data['tiporeg'], 
	                                       'ani_descripcion' => $data['descripcion'],
	                                       'ani_raza' => 'jose' ,
	                                       'ani_estado' => 1 ));
	      
	    }

	  	}
?>