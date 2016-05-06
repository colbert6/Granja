<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Servicio_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('ser_estado',1);
	        $query=$this->db->get('servicio');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('ser_id',$id);
	        $query=$this->db->get('servicio');
	       // print_r($query);
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('servicio',array('ser_animal' => $data['animal'],
	        							   'ser_fecha_evento' => $data['fecha_evento'],
	        							   'ser_reproductor' => $data['reproductor'],
	        							   'ser_personal' => $data['personal'],
	        							   'ser_tipo_servicio' => $data['tipo_servicio'],
	        							   'ser_estado' => 1 ));
	      
	    }

	    function editar($data){
	    	$datos=array(                  'ser_animal' => $data['animal'],
	        							   'ser_fecha_evento' => $data['fecha_evento'],
	        							   'ser_reproductor' => $data['reproductor'],
	        							   'ser_personal' => $data['personal'],
	        							   'ser_tipo_servicio' => $data['tipo_servicio'],
	        							   'ser_estado' => 1  );
	    	//print_r($datos);
	    	$this->db->where('ser_id',$data['id']);
	        $query=$this->db->update('servicio',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('ser_estado' => 0   );
	    	$this->db->where('ser_id',$id);
	        $query=$this->db->update('servicio',$datos);
	        return $query;
	    }


	  	}
?>