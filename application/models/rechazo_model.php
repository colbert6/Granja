<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Rechazo_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('recha_estado',1);
	        $query=$this->db->get('rechazo');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('recha_id',$id);
	        $query=$this->db->get('rechazo');
	       // print_r($query);
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('rechazo',array('recha_rp' => $data['rp'],
	        							   'recha_fecha_evento' => $data['fecha_evento'],
	        							   'recha_causa_rechazo' => $data['causa_rechazo'],
	        							   'recha_estado' => 1 ));
	        $this->db->select_max('recha_id');	        
			$query = $this->db->get('rechazo');

	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array(                  'recha_rp' => $data['rp'],
	        							   'recha_fecha_evento' => $data['fecha_evento'],
	        							   'recha_causa_rechazo' => $data['causa_rechazo'],
	        							   'recha_estado' => 1);
	    	//print_r($datos);
	    	$this->db->where('recha_id',$data['id']);
	        $query=$this->db->update('rechazo',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('recha_estado' => 0   );
	    	$this->db->where('recha_id',$id);
	        $query=$this->db->update('rechazo',$datos);
	        return $query;
	    }


	  	}
?>