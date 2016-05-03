<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Celo_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('celo_estado',1);
	        $query=$this->db->get('celo');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('celo_id',$id);
	        $query=$this->db->get('celo');
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('celo',array('celo_rp' => $data['rp'],
	        							   'celo_causa_no_inseminal' => $data['causa_no_enseminal'],
	        							   'celo_fecha_evento' => $data['fecha'],
	        							   'celo_medicina_genital' => $data['medicina_genital'],
	        							   'celo_via_aplicacion' => $data['via_aplicacion'],
	                                       'celo_estado' => 1 ));
	      
	    }

	    function editar($data){
	    	$datos=array(                  'celo_rp' => $data['rp'],
	        							   'celo_causa_no_inseminal' => $data['causa_no_enseminal'],
	        							   'celo_fecha_evento' => $data['fecha'],
	        							   'celo_medicina_genital' => $data['medicina_genital'],
	        							   'celo_via_aplicacion' => $data['via_aplicacion'],
	                                       'celo_estado' => 1 );
	    	$this->db->where('celo_id',$data['id']);
	        $query=$this->db->update('celo',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('celo_estado' => 0   );
	    	$this->db->where('celo_id',$id);
	        $query=$this->db->update('celo',$datos);
	        return $query;
	    }


	  	}
?>