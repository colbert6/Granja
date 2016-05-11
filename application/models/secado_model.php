<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Secado_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('sec_estado',1);
	        $query=$this->db->get('secado');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('sec_id',$id);
	        $query=$this->db->get('secado');
	       // print_r($query);
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('secado',array('sec_rp' => $data['rp'],
	        							   'sec_fecha_evento' => $data['fecha_evento'],
	        							   'sec_cuarto_mamarios' => $data['cuarto_mamarios'],
	        							   'sec_estado' => 1 ));
	        $this->db->select_max('sec_id');	        
			$query = $this->db->get('secado');
			return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array(                  'sec_rp' => $data['rp'],
	        							   'sec_fecha_evento' => $data['fecha_evento'],
	        							   'sec_cuarto_mamarios' => $data['cuarto_mamarios'],
	        							   'sec_estado' => 1  );
	    	//print_r($datos);
	    	$this->db->where('sec_id',$data['id']);
	        $query=$this->db->update('secado',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('sec_estado' => 0   );
	    	$this->db->where('sec_id',$id);
	        $query=$this->db->update('secado',$datos);
	        return $query;
	    }


	  	}
?>