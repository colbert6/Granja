<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function selectUser($user= ''){

	        $this->db->where('usu_nombre',$user);
	        $query=$this->db->get('usuario');

	        if ($query->num_rows()>0) {
	        	return $query->row();
	        } else {
	        	return null;
	        }
	        
	   
	    }


	}

?>
