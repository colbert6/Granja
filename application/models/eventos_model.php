<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Eventos_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('eve_estado',1);
	        $query=$this->db->get('eventos');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('eve_id',$id);
	        $query=$this->db->get('eventos');
	        return $query;
	   
	    }

	    function selectYear($año){
	    $sql = "SELECT `eve_id`, `id_tabla`, `sim_id`, `ani_id`, `eve_fecha`, `eve_estado` 
				FROM `eventos` 
				WHERE YEAR(`eve_fecha`)='".$año."' and `eve_estado`=1";
	    $query=$this->db->query($sql);
	    return $query;
	   
	    }
	    function selectevento(){
	    $sql = "SELECT e.ani_id as id,e.eve_fecha as fecha,si.evento as evento
				FROM eventos e inner join simbolo si on (e.sim_id=si.sim_id)
				ORDER BY e.ani_id,e.eve_fecha asc;";

	    $query=$this->db->query($sql);
	    return $query;
	   
	    }

	    function crear($data){	    	
	        $this->db->insert('eventos',array(
	        							   'id_tabla' => $data['id_tabla'],
	        							   'sim_id' => $data['sim_id'],
	        							   'ani_id' => $data['ani_id'],
	        							   'eve_fecha' => $data['eve_fecha'],
	                                       'eve_estado' => 1 ));
	        $this->db->select_max('eve_id');	        
			$query = $this->db->get('eventos');

	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array('eve_fecha' => $data['eve_fecha']);
	    	$this->db->where('eve_id',$data['eve_id']);
	        $query=$this->db->update('eventos',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('eve_estado' => 0   );
	    	$this->db->where('eve_id',$id);
	        $query=$this->db->update('eventos',$datos);
	        return $query;

	    }


	  	}
?>