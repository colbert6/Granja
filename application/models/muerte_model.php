<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Muerte_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('mue_estado',1);
	        $query=$this->db->get('muerte');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('mue_id',$id);
	        $query=$this->db->get('muerte');
	       // print_r($query);
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('muerte',array('mue_rp' => $data['rp'],
	        							   'mue_fecha_evento' => $data['fecha'],
	        							   'mue_espec_muerte' => $data['espec_muerte'],
	        							   'mue_estado' => 1 ));
	      
	    }

	    function editar($data){
	    	$datos=array(                  'mue_rp' => $data['rp'],
	        							   'mue_fecha_evento' => $data['fecha'],
	        							   'mue_espec_muerte' => $data['espec_muerte'],
	        							   'mue_estado' => 1  );
	    	//print_r($datos);
	    	$this->db->where('mue_id',$data['id']);
	        $query=$this->db->update('muerte',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('mue_estado' => 0   );
	    	$this->db->where('mue_id',$id);
	        $query=$this->db->update('muerte',$datos);
	        return $query;
	    }


	  	}
?>