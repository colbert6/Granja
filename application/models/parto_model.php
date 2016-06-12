<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Parto_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    function select(){
	    	$this->db->where('par_estado',1);
	        $query=$this->db->get('parto');
	        return $query;
	    }

	    function selectId($id){
	        $this->db->where('par_id',$id);
	        $query=$this->db->get('parto');
	       // print_r($query);
	        return $query;
	   
	    }


	    function crear($data){
	    	
	        $this->db->insert('parto',array('par_rp' => $data['rp'],
	        							   'par_fechanac' => $data['fechanac'],
	        							   'par_estado_cria' => $data['estado_cria'],
	        							   'par_tipo_parto' => $data['tipo_parto'],
	        							   'par_sexo_cria' => $data['sexo_cria'],
	        							   'par_servicio' => $data['servicio'],
	        							   'par_estado' => 1 ));
	        $this->db->select_max('par_id');	        
			$query = $this->db->get('parto');

	        return $query->row();
	      
	    }

	    function editar($data){
	    	$datos=array(                  'par_rp' => $data['rp'],
	        							   'par_fechanac' => $data['fechanac'],
	        							   'par_estado_cria' => $data['estado_cria'],
	        							   'par_tipo_parto' => $data['tipo_parto'],
	        							   'par_sexo_cria' => $data['sexo_cria'],
	        							   'par_servicio' => $data['servicio'],
	        							   'par_estado' => 1  );
	    	//print_r($datos);
	    	$this->db->where('par_id',$data['id']);
	        $query=$this->db->update('parto',$datos);
	        return $query;
	    }

	    function eliminar($id){
	    	$datos=array('par_estado' => 0   );
	    	$this->db->where('par_id',$id);
	        $query=$this->db->update('parto',$datos);
	        return $query;
	    }

	    function num_partos(){
	    	$query = $this->db->query(
		    	"SELECT p.par_rp ,count(p.par_id) as num_par
				FROM parto p
				WHERE p.par_estado = '1'
				GROUP BY p.par_rp"
			);
	    	return $query;
	    }


	  	}
?>