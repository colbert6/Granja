<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Reproductor_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('repro_estado',1);
            $query=$this->db->get('reproductor');
            return $query;
        }

        function selectId($id){
            $this->db->where('repro_id',$id);
            $query=$this->db->get('reproductor');
            return $query;       
        }
        function crear($data){
        $this->db->insert('reproductor',array('repro_descripcion' => $data['descripcion'],
                                            'repro_abreviatura' => $data['abreviacion'],
                                            'repro_estado' => 1 ));
        }
        function editar($data){
            $datos=array('repro_descripcion' => $data['descripcion'],
                        'repro_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('repro_id',$data['id']);
            $query=$this->db->update('reproductor',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('repro_estado' => 0   );
            $this->db->where('repro_id',$id);
            $query=$this->db->update('reproductor',$datos);
            return $query;
        }

    }
?>