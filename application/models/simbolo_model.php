<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Simbolo_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('sim_estado',1);
	        $query=$this->db->get('simbolo');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('sim_id',$id);
	        $query=$this->db->get('simbolo');
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('simbolo',array('evento' => $data['evento'],
	        								'sim_descripcion' => $data['sim_descripcion'],
	        							   'sim_icono' => $data['sim_icono'],
	                                       'sim_estado' => 1 ));
	      
	    }

	    function editar($data){
	    	$datos=array(                  'sim_descripcion' => $data['sim_descripcion'],
	        							   'sim_icono' => $data['sim_icono']
	        			);
	    	$this->db->where('sim_id',$data['sim_id']);
	        $query=$this->db->update('simbolo',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('sim_estado'=>0);
	    	$this->db->where('sim_id',$id);
	        $query=$this->db->update('eventos',$datos);
	        return $query;
	    }


	  	}
?>