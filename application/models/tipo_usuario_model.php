<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tipo_usuario_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('tipusu_estado',1);
	        $query=$this->db->get('tipo_usuario');
	        return $query;
	        
	    }
 	
	    function selectId($id){
	        $this->db->where('tipusu_id',$id);
	        $this->db->where('tipusu_estado',1);
	        $query=$this->db->get('tipo_usuario');
	        return $query;
	   
	    }

	    function crear($data){
	       $query= $this->db->insert('tipo_usuario',array('tipusu_descripcion' => $data['descripcion'],
	        									'tipusu_estado' => 1));
	        
	        $this->db->select_max('tipusu_id');	        
			$query = $this->db->get('tipo_usuario');

	        return $query->row();
	    }

	    function editar($data){
	    	$datos=array('tipusu_descripcion' => $data['descripcion']);

	    	$this->db->where('tipusu_id',$data['id']);
	        $query=$this->db->update('tipo_usuario',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('tipusu_estado' => 0   );
	    	$this->db->where('tipusu_id',$id);
	        $query=$this->db->update('tipo_usuario',$datos);
	        return $query;
	    }

	}
?>