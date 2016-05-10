<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Analisis_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('ana_estado',1);
	        $query=$this->db->get('analisis');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('ana_id',$id);
	        $query=$this->db->get('analisis');
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('analisis',array('ana_animal' => $data['animal'],
	        							   'ana_tipo_analisis' => $data['tipana'],
	        							   'ana_fecha_evento' => $data['fecha'],
	        							   'ana_resul_analisis' => $data['resultado_ana'],
	                                       'ana_estado' => 1 ));
	        $this->db->select_max('ana_id');	        
			$query = $this->db->get('analisis');

	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array(                  'ana_animal' => $data['animal'],
	        							   'ana_tipo_analisis' => $data['tipana'],
	        							   'ana_fecha_evento' => $data['fecha'],
	        							   'ana_resul_analisis' => $data['resultado_ana'],
	                                       'ana_estado' => 1);
	    	$this->db->where('ana_id',$data['id']);
	        $query=$this->db->update('analisis',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('ana_estado' => 0   );
	    	$this->db->where('ana_id',$id);
	        $query=$this->db->update('analisis',$datos);
	        return $query;
	    }


	  	}
?>