<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Caja_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	        $query=$this->db->get('caja');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('caj_id',$id);
	        $query=$this->db->get('caja');
	        return $query;
	   
	    }

	    function crear($data){
	    	
	        $this->db->insert('caja',array('fecha' => $data['fecha'],
	        							   'cantidad' => $data['cantidad'],
	        							   'tipo' => $data['tipo'],
	                                       'estado' => $data['estado'],
	                                       'descripcion' => $data['descripcion'],
	                                       'ingreso' => $data['ingreso'],
	                                       'e_compra' => $data['e_compra'],
	                                       'e_medicina' => $data['e_medicina'],
	                                       'e_transporte' => $data['e_transporte']));
	        $this->db->select_max('caj_id');	        
			$query = $this->db->get('caja');
	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array('fecha' => $data['fecha'],
	        			 'cantidad' => $data['cantidad'],
	        			 'tipo' => $data['tipo'],
	                     'estado' => $data['estado'],
	                     'descripcion' => $data['descripcion'],
	                     'ingreso' => $data['ingreso'],
	                     'e_compra' => $data['e_compra'],
	                     'e_medicina' => $data['e_medicina'],
	                     'e_transporte' => $data['e_transporte']);

	    	$this->db->where('caj_id',$data['id']);
	        $query=$this->db->update('caja',$datos);
	        return $query;
	    }

	}
?>