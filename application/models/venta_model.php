<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Venta_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('venta_estado',1);
	        $query=$this->db->get('venta');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('venta_id',$id);
	        $query=$this->db->get('venta');
	       // print_r($query);
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('venta',array('venta_rp' => $data['rp'],
	        							   'venta_fecha_evento' => $data['fecha_evento'],
	        							   'venta_especif_venta' => $data['especif_venta'],
	        							   'venta_estado' => 1 ));
	        $this->db->select_max('venta_id');	        
			$query = $this->db->get('venta');

	        return $query->row();      
	    }

	    function editar($data){
	    	$datos=array(                  'venta_rp' => $data['rp'],
	        							   'venta_fecha_evento' => $data['fecha_evento'],
	        							   'venta_especif_venta' => $data['especif_venta'],
	        							   'venta_estado' => 1 );
	    	//print_r($datos);
	    	$this->db->where('venta_id',$data['id']);
	        $query=$this->db->update('venta',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('venta_estado' => 0   );
	    	$this->db->where('venta_id',$id);
	        $query=$this->db->update('venta',$datos);
	        return $query;
	    }


	  	}
?>