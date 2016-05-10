<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Aborto_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('ab_estado',1);
	        $query=$this->db->get('aborto');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('ab_id',$id);
	        $query=$this->db->get('aborto');
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('aborto',array('ab_animal' => $data['animal'],
	        							   'ab_causa_aborto' => $data['cauabor'],
	        							   'ab_fecha_evento' => $data['fecha'],
	                                       'ab_estado' => 1 ));
	        $this->db->select_max('ab_id');	        
			$query = $this->db->get('aborto');

	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array(                  'ab_animal' => $data['animal'],
	        							   'ab_causa_aborto' => $data['cauabor'],
	        							   'ab_fecha_evento' => $data['fecha'],
	                                       'ab_estado' => 1
	        			);
	    	$this->db->where('ab_id',$data['id']);
	        $query=$this->db->update('aborto',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('ab_estado' => 0   );
	    	$this->db->where('ab_id',$id);
	        $query=$this->db->update('aborto',$datos);
	        return $query;
	    }


	  	}
?>