<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Especificacion_muerte_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('espmu_estado',1);
            $query=$this->db->get('especificacion_muerte');
            return $query;
        }

        function selectId($id){
            $this->db->where('espmu_id',$id);
            $query=$this->db->get('especificacion_muerte');
            return $query;       
        }
        function crear($data){
        $this->db->insert('especificacion_muerte',array('espmu_descripcion' => $data['descripcion'],
                                            'espmu_abreviatura' => $data['abreviacion'],
                                            'espmu_estado' => 1 ));
        }
        function editar($data){
            $datos=array('espmu_descripcion' => $data['descripcion'],
                        'espmu_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('espmu_id',$data['id']);
            $query=$this->db->update('especificacion_muerte',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('espmu_estado' => 0   );
            $this->db->where('espmu_id',$id);
            $query=$this->db->update('especificacion_muerte',$datos);
            return $query;
        }

    }
?>