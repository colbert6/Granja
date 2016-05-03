<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Usuario_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('usu_estado',1);
	        $query=$this->db->get('usuario');
	        return $query;
	        
	    }

	    function selectId($id){
	        $this->db->where('usu_id',$id);
	        $query=$this->db->get('usuario');
	        return $query;
	   
	    }

	    function crear($data){
	        $this->db->insert('usuario',array('usu_nombre' => $data['nombre'],
	        								'usu_password' => $data['password'],
	        								'usu_estado' => 1 ,
	        								'usu_personal' => $data['personal'],
	        								'usu_tipo_usuario' => $data['tipo_usuario']));
	    }

	    function editar($data){
	    	$datos=array('usu_nombre' => $data['nombre'],
						'usu_password' => $data['password'],
						'usu_personal' => $data['personal'],
						'usu_tipo_usuario' => $data['tipo_usuario']);

	    	$this->db->where('usu_id',$data['id']);
	        $query=$this->db->update('usuario',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('usu_estado' => 0   );
	    	$this->db->where('usu_id',$id);
	        $query=$this->db->update('usuario',$datos);
	        return $query;
	    }

	}
?>