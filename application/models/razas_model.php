<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Razas_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	        $query=$this->db->get('raza');
	        return $query;
	        /*if($query->num_rows()>0)
	        	return $query;
	        else 
	        	return false;*/
	    }

	    function crear($data){
	        $this->db->insert('raza',array('raz_descripcion' => $data['descripcion'],
	        								'raz_abreviacion' => $data['abreviacion'],
	        								'raz_estado' => 1 ));
	    }

	}
?>