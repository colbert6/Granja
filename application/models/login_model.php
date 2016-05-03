<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function selectUser($user= ''){
	    	

			$sql="  SELECT u.*,p.*,tu.* 
					FROM usuario as u , personal as p , tipo_usuario as tu 
					WHERE u.usu_personal =p.per_id and tu.tipusu_id=u.usu_tipo_usuario and
						  u.usu_estado=1 and u.usu_nombre='".$user."'";

	        $query=$this->db->query($sql);

	        if ($query->num_rows()>0) {
	        	return $query->row();
	        } else {
	        	return null;
	        }
	        
	   
	    }


	}

?>
