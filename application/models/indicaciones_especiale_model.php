<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Enfermedad_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('indes_estado',1);
	        $query=$this->db->get('indicaciones_esp');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('indes_id',$id);
	        $query=$this->db->get('indicaciones_esp');
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('indicaciones_esp',array('indes_rp' => $data['rp'],
	        							   'indes_fecha_evento' => $data['fecha'],
	        							   'indes_indicaciones_esp' => $data['indicaciones_esp'],
	                                       'indes_estado' => 1 ));
	      
	    }

	    function editar($data){
	    	$datos=array(                  'indes_rp' => $data['rp'],
	        							   'indes_fecha_evento' => $data['fecha'],
	        							   'indes_indicaciones_esp' => $data['indicaciones_esp'],
	                                       'indes_estado' => 1);
	    	//print_r($datos);
	    	$this->db->where('indes_id',$data['id']);
	        $query=$this->db->update('indicaciones_esp',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('indes_estado' => 0   );
	    	$this->db->where('indes_id',$id);
	        $query=$this->db->update('indicaciones_esp',$datos);
	        return $query;
	    }


	  	}
?>