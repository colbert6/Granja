<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tipo_servicio_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('tipse_estado',1);
            $query=$this->db->get('tipo_servicio');
            return $query;
        }

        function selectId($id){
            $this->db->where('tipse_id',$id);
            $query=$this->db->get('tipo_servicio');
            return $query;       
        }
        function crear($data){
        $this->db->insert('tipo_servicio',array('tipse_descripcion' => $data['descripcion'],
                                            'tipse_abreviatura' => $data['abreviacion'],
                                            'tipse_estado' => 1 ));
        }
        function editar($data){
            $datos=array('tipse_descripcion' => $data['descripcion'],
                        'tipse_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('tipse_id',$data['id']);
            $query=$this->db->update('tipo_servicio',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('tipse_estado' => 0   );
            $this->db->where('tipse_id',$id);
            $query=$this->db->update('tipo_servicio',$datos);
            return $query;
        }

    }
?>