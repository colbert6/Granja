<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Causa_aborto_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('ca_estado',1);
            $query=$this->db->get('causa_aborto');
            return $query;
        }

        function selectId($id){
            $this->db->where('ca_id',$id);
            $query=$this->db->get('causa_aborto');
            return $query;       
        }
        function crear($data){
        $this->db->insert('causa_aborto',array('ca_descripcion' => $data['descripcion'],
                                            'ca_abreviatura' => $data['abreviacion'],
                                            'ca_estado' => 1 ));
        }
        function editar($data){
            $datos=array('ca_descripcion' => $data['descripcion'],
                        'ca_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('ca_id',$data['id']);
            $query=$this->db->update('causa_aborto',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('ca_estado' => 0   );
            $this->db->where('ca_id',$id);
            $query=$this->db->update('causa_aborto',$datos);
            return $query;
        }

    }
?>