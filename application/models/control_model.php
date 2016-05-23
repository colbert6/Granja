<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Control_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	        $query=$this->db->get('control');
	        return $query;
	    }

	    function selectIdAnimal($id){
	        $this->db->where('con_id',$id);
	        $query=$this->db->get('control');
	        return $query;
	    }

		function selectFecha($fecha){
	        $this->db->where('con_fecha',$fecha);
	        $query=$this->db->get('control');
	        return $query;
	    }

	    function selectFechas($fecha){
	        $this->db->where('con_fecha',$fecha);
	        $query=$this->db->get('control');
	        return $query;
	    }

	    function crear($data){
	    	
	        $this->db->insert('control',array('con_rp' => $data['animal'],
	        							   'con_fecha' => $data['fecha'],
	        							   'con_control_1' => $data['control_1'],
	        							   'con_control_2' => $data['control_2'],
	                                       'con_estado' => 1 ));
	        $this->db->select_max('con_id');	       
			$query = $this->db->get('control');

	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array(	'con_id' => $data['id'],
								'con_rp' => $data['animal'],
							   'con_fecha' => $data['fecha'],
							   'con_control_1' => $data['control_1'],
							   'con_control_2' => $data['control_2'],
                               'con_estado' => 1 );
	    	$this->db->where('con_id',$data['id']);
	        $query=$this->db->update('control',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	/*$datos=array('con_estado' => 0   );
	    	$this->db->where('con_id',$id);
	        $query=$this->db->update('control',$datos);
	        return $query;¨*/
	    }


	  	}
?>