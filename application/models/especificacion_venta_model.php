<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Especificacion_venta_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('espve_estado',1);
            $query=$this->db->get('especificacion_venta');
            return $query;
        }

        function selectId($id){
            $this->db->where('espve_id',$id);
            $query=$this->db->get('especificacion_venta');
            return $query;       
        }
        function crear($data){
        $this->db->insert('especificacion_venta',array('espve_descripcion' => $data['descripcion'],
                                            'espve_abreviatura' => $data['abreviacion'],
                                            'espve_estado' => 1 ));
        }
        function editar($data){
            $datos=array('espve_descripcion' => $data['descripcion'],
                        'espve_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('espve_id',$data['id']);
            $query=$this->db->update('especificacion_venta',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('espve_estado' => 0   );
            $this->db->where('espve_id',$id);
            $query=$this->db->update('especificacion_venta',$datos);
            return $query;
        }

    }
?>