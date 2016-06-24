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

	    function selectAnimalesParto(){
	    	$sql="SELECT a.ani_id,a.ani_rp,a.ani_nombre
					FROM animal as a,parto as p  
					WHERE a.ani_id=p.par_rp 
					GROUP BY a.ani_id,a.ani_rp,a.ani_nombre
					HAVING count(p.par_id)>=1";

	        $query=$this->db->query($sql);
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
	                                       'ani_tiporeg' => $data['tiporeg'], 
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
	                                       'ani_tiporeg' => $data['tiporeg'], 
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

	    function produccion1(){
	    	$sql="SELECT 
			a.ani_id as 'a_id',
			a.ani_rp as 'a_rp',
			a.ani_nombre as 'a_nombre',
			(SELECT count(`par_id`) FROM `parto` WHERE `par_estado` = '1' and `par_rp`= a.ani_id) as num_par,
			u.up_fecha,
			u.up_sexo,
			u.up_tipser

			FROM animal a
			inner join (SELECT 
			a.ani_id,
			(SELECT p.par_servicio FROM parto p WHERE p.par_estado = '1' and p.par_rp= a.ani_id order by p.par_fechanac desc LIMIT 1) as 'up_ser_id',
			(SELECT p.par_fechanac FROM parto p WHERE p.par_estado = '1' and p.par_rp= a.ani_id order by p.par_fechanac desc LIMIT 1) as 'up_fecha',
			(SELECT UPPER(sc.sexcr_abreviatura) FROM parto p inner join sexo_cria sc on (p.par_sexo_cria=sc.sexcr_id) WHERE p.par_estado = '1' and p.par_rp= a.ani_id order by p.par_fechanac desc LIMIT 1) as 'up_sexo',
			(SELECT UPPER(ts.tipse_abreviatura) FROM parto p inner join servicio s on (s.ser_id=p.par_servicio) inner join
			    tipo_servicio ts on (ts.tipse_id=s.ser_tipo_servicio) WHERE p.par_estado = '1' and p.par_rp= a.ani_id order by p.par_fechanac desc LIMIT 1) as 'up_tipser'
			FROM animal a) u on (u.ani_id = a.ani_id) 
			where a.ani_estado = '1'
			order by a.ani_id asc";

	        $query=$this->db->query($sql);
	        return $query;
	    }

	  	}
?>