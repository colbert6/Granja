<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Enfermedad_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('enf_estado',1);
	        $query=$this->db->get('enfermedad');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('enf_id',$id);
	        $query=$this->db->get('enfermedad');
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('enfermedad',array('enf_rp' => $data['rp'],
	        							   'enf_tipo_enfermedad' => $data['tipo_enfermedad'],
	        							   'enf_medicamento' => $data['medicamento'],
	        							   'enf_fecha_evento' => $data['fecha'],
	        							   'enf_via_aplicacion' => $data['via_aplicacion'],
	                                       'enf_estado' => 1 ));
	        $this->db->select_max('enf_id');	        
			$query = $this->db->get('enfermedad');

	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array(                  'enf_rp' => $data['rp'],
	        							   'enf_tipo_enfermedad' => $data['tipo_enfermedad'],
	        							   'enf_medicamento' => $data['medicamento'],
	        							   'enf_fecha_evento' => $data['fecha'],
	        							   'enf_via_aplicacion' => $data['via_aplicacion'],
	                                       'enf_estado' => 1 );
	    	//print_r($datos);
	    	$this->db->where('enf_id',$data['id']);
	        $query=$this->db->update('enfermedad',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('enf_estado' => 0   );
	    	$this->db->where('enf_id',$id);
	        $query=$this->db->update('enfermedad',$datos);
	        return $query;
	    }


	  	}
?>