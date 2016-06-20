<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tiempo_parto_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	        $query=$this->db->get('tiempo_parto');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('tiempar_id',$id);
	        $query=$this->db->get('tiempo_parto');
	        return $query;
	   
	    }


	/*    function crear($data){
	    	
	        $this->db->insert('celo',array('descripcion' => $data['descripcion'],
	        							   'cant' => $data['cant'],
	        							   'unidad_tiempo' => $data['unidad']));
	        $this->db->select_max('tiempar_id');	        
			$query = $this->db->get('tiempo_parto');

	        return $query->row();
	      
	    }*/

	    function editar($data){
	    	$datos=array(                  'descripcion' => $data['descripcion'],
	        							   'cant' => $data['cant'],
	        							   'unidad_tiempo' => $data['unidad']);
	    	$this->db->where('tiempar_id',$data['id']);
	        $query=$this->db->update('tiempo_parto',$datos);
	        return $query;
	    }

	}
?>