<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Modulo_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('mod_estado',1);
	        $query=$this->db->get('modulo');
	        return $query;
	        
	    }
 	
	    function selectId($id){
	        $this->db->where('mod_id',$id);
	        $query=$this->db->get('modulo');
	        return $query;
	   
	    }

	    function selectOrderPadre(){
	    	$this->db->where('mod_estado',1);	    	
	        $this->db->order_by('mod_padre');
	        $query=$this->db->get('modulo');
	        return $query;
	        
	    }

	    function crear($data){
	        $this->db->insert('modulo',array('mod_descripcion' => $data['descripcion'],
	        									'mod_padre' => $data['padre'],
	        									'mod_url' => $data['url'],
	        									'mod_estado' => 1));
	    }

	    function editar($data){
	    	$datos=array('mod_descripcion' => $data['descripcion'],
	        									'mod_padre' => $data['padre'],
	        									'mod_url' => $data['url'],
	        									'mod_estado' => 1);

	    	$this->db->where('mod_id',$data['id']);
	        $query=$this->db->update('modulo',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('mod_estado' => 0   );
	    	$this->db->where('mod_id',$id);
	        $query=$this->db->update('modulo',$datos);
	        return $query;
	    }

	}
?>