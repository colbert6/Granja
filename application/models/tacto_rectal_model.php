<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tacto_rectal_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('tarec_estado',1);
	        $query=$this->db->get('tacto_rectal');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('tarec_id',$id);
	        $query=$this->db->get('tacto_rectal');
	       // print_r($query);
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('tacto_rectal',array('tarec_rp' => $data['rp'],
	        							   'tarec_fecha_evento' => $data['fecha_evento'],
	        							   'tarec_diag_utero' => $data['diag_utero'],
	        							   'tarec_enfe_ovario' => $data['enfe_ovario'],
	        							   'tarec_enfe_utero' => $data['enfe_utero'],
	        							   'tarec_via_aplicacion' => $data['via_aplicacion'],
	        							   'tarec_med_genital' => $data['med_genital'],
	        							   'tarec_estado' => 1 ));
	      
	    }

	    function editar($data){
	    	$datos=array(                  'tarec_rp' => $data['rp'],
	        							   'tarec_fecha_evento' => $data['fecha_evento'],
	        							   'tarec_diag_utero' => $data['diag_utero'],
	        							   'tarec_enfe_ovario' => $data['enfe_ovario'],
	        							   'tarec_enfe_utero' => $data['enfe_utero'],
	        							   'tarec_via_aplicacion' => $data['via_aplicacion'],
	        							   'tarec_med_genital' => $data['med_genital'],
	        							   'tarec_estado' => 1  );
	    	//print_r($datos);
	    	$this->db->where('tarec_id',$data['id']);
	        $query=$this->db->update('tacto_rectal',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('tarec_estado' => 0   );
	    	$this->db->where('tarec_id',$id);
	        $query=$this->db->update('tacto_rectal',$datos);
	        return $query;
	    }


	  	}
?>