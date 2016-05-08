<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Modulo_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$sql=" SELECT mh.*,mp.mod_descripcion as 'padre_desc' 
					FROM modulo as mh ,modulo as mp 
					WHERE mh.mod_padre=mp.mod_id and mh.mod_estado=1 
					ORDER by mh.mod_padre ASC ";

	        $query=$this->db->query($sql);

	        return $query;
	        
	    }
 	
	    function selectId($id){
	    	$this->db->where('mod_estado',1);	
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

	    function selectMenu($user){	    	

			$sql=" SELECT mh.*,mp.mod_descripcion as 'padre' ,p.per_estado
					FROM modulo as mh ,modulo as mp , permiso as p 
					WHERE mh.mod_padre=mp.mod_id and mh.mod_id=p.per_modulo and mh.mod_estado=1 
						 and p.per_estado=1 and p.per_tipo_usuario=".$user.
				"   ORDER by mp.mod_id ASC ";

	        $query=$this->db->query($sql);

	        return $query;
	        
	        
	    }

	    function selectPadre(){
	    	$this->db->where('mod_estado',1);
	    	$this->db->where('mod_padre',0);	
	        $query=$this->db->get('modulo');
	        return $query;
	        
	    }

	    function crear($data){
	        $this->db->insert('modulo',array('mod_descripcion' => $data['descripcion'],
	        									'mod_padre' => $data['padre'],
	        									'mod_url' => $data['url'],
	        									'mod_estado' => 1));
	        $this->db->select_max('mod_id');	        
			$query = $this->db->get('modulo');
			return $query;

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