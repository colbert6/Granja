<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tipo_registro_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('tipreg_estado',1);
	        $query=$this->db->get('tipo_registro');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('tipreg_id',$id);
	        $query=$this->db->get('tipo_registro');
	        return $query;
	   
	    }

	    function crear($data){
	        $this->db->insert('tipo_registro',array('tipreg_descripcion' => $data['descripcion'], 
	        										'tipreg_estado' => 1 ));
	    }

	     function editar($data){
	    	$datos=array('tipreg_descripcion' => $data['descripcion']
	        			);
	    	$this->db->where('tipreg_id',$data['id']);
	        $query=$this->db->update('tipo_registro',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('tipreg_estado' => 0   );
	    	$this->db->where('tipreg_id',$id);
	        $query=$this->db->update('tipo_registro',$datos);
	        return $query;
	    }


	}
?>