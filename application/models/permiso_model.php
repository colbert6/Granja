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

	    	$sql=" SELECT m.mod_id,m.mod_descripcion ,p.per_estado , mp.mod_descripcion as 'padre',
	    					mp.mod_id as 'id_padre'
					FROM modulo as m ,modulo as mp , permiso as p 
					WHERE m.mod_padre=mp.mod_id and m.mod_id=p.per_modulo 
						 and p.per_tipo_usuario=".$id. 
				"   ORDER by mp.mod_padre ASC ";

	        $query=$this->db->query($sql);

	        return $query;
	   
	    }

	    function crear($data){
	        $this->db->insert('permiso',array('per_tipo_usuario' => $data['tipo_usuario'],
	        								'per_modulo' => $data['modulo'],
	        								'per_estado' => $data['estado']));
	    }

	    function DarPermiso($data){
	    	$datos=array('per_estado' =>$data['estado']);
	    	$this->db->where('per_tipo_usuario',$data['id_tipo']);
	    	$this->db->where('per_modulo',$data['modulo']);
	        $query=$this->db->update('permiso',$datos);
	        return $query;
	    }

	    function QuitarPermiso($id){
	    	$datos=array('per_estado' =>0);
	    	$this->db->where('per_tipo_usuario',$id);
	        $query=$this->db->update('permiso',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('per_estado' => 0   );
	    	$this->db->where('per_id',$id);
	        $query=$this->db->update('permiso',$datos);
	        return $query;
	    }

	}
?>