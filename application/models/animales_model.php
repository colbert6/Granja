<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Animales_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('ani_estado',1);
	        $query=$this->db->get('animal');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('ani_id',$id);
	        $query=$this->db->get('animal');
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('animal',array('ani_rp' => $data['codigo'],
	        							   'ani_nombre' => $data['nombre'],
	        							   'ani_padre' => $data['padre'],
	                                       'ani_madre' => $data['madre'],			
	                                       'ani_fechanac' => $data['fechanac'],
	                                       'ani_fechareg' => $data['fechareg'],
	                                       'ani_sexo' => $data['sexo'],
	                                       'ani_proveedor' => $data['proveedor'],
	                                   //    'ani_tiporeg' => $data['tiporeg'], 
	                                       'ani_descripcion' => $data['descripcion'],
	                                       'ani_raza' => $data['raza'] ,
	                                       'ani_estado' => 1 ));
	      
	    }

	    function editar($data){
	    	$datos=array(                  'ani_rp' => $data['codigo'],
	        							   'ani_nombre' => $data['nombre'],
	        							   'ani_padre' => $data['padre'],
	                                       'ani_madre' => $data['madre'],			
	                                       'ani_fechanac' => $data['fechanac'],
	                                       'ani_fechareg' => $data['fechareg'],
	                                       'ani_sexo' => $data['sexo'],
	                                       'ani_proveedor' => $data['proveedor'],
	                               //        'ani_tiporeg' => $data['tiporeg'], 
	                                       'ani_descripcion' => $data['descripcion'],
	                                       'ani_raza' => $data['raza'] ,
	                                       'ani_estado' => 1
	        			);
	    	$this->db->where('ani_id',$data['id']);
	        $query=$this->db->update('animal',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('ani_estado' => 0   );
	    	$this->db->where('ani_id',$id);
	        $query=$this->db->update('animal',$datos);
	        return $query;
	    }


	  	}
?>