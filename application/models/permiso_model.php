<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Permiso_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	        $query=$this->db->get('permiso');
	        return $query;
	        
	    }

	    function selectId($id){
	        $this->db->where('per_user',$id);
	        $query=$this->db->get('permiso');
	        return $query;
	   
	    }

	    function crear($data){
	        $this->db->insert('permiso',array('usu_nombre' => $data['nombre'],
	        								'usu_password' => $data['password'],
	        								'usu_estado' => 1 ,
	        								'usu_personal' => $data['personal'],
	        								'usu_tipo_permiso' => $data['tipo_permiso']));
	    }

	    function editar($data){
	    	$datos=array('usu_nombre' => $data['nombre'],
						'usu_password' => $data['password'],
						'usu_personal' => $data['personal'],
						'usu_tipo_permiso' => $data['tipo_permiso']);

	    	$this->db->where('usu_id',$data['id']);
	        $query=$this->db->update('permiso',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('usu_estado' => 0   );
	    	$this->db->where('usu_id',$id);
	        $query=$this->db->update('permiso',$datos);
	        return $query;
	    }

	}
?>