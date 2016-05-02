<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tipo_registro_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('tipre_estado',1);
	        $query=$this->db->get('tipo_registro');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('tipreg_id',$id);
	        $query=$this->db->get('tipo_registro');
	        return $query;
	   
	    }

	    function crear($data){
	        $this->db->insert('tipo_registro',array('tipre_descripcion' => $data['descripcion'], 
	        										'tipre_estado' => 1 ));
	    }

	     function editar($data){
	    	$datos=array('tipre_descripcion' => $data['descripcion']
	        			);
	    	$this->db->where('tipre_id',$data['id']);
	        $query=$this->db->update('tipo_registro',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('tipre_estado' => 0   );
	    	$this->db->where('tipre_id',$id);
	        $query=$this->db->update('tipo_registro',$datos);
	        return $query;
	    }


	}
?>