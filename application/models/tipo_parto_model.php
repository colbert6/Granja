<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tipo_parto_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('tippar_estado',1);
            $query=$this->db->get('tipo_parto');
            return $query;
        }

        function selectId($id){
            $this->db->where('tippar_id',$id);
            $query=$this->db->get('tipo_parto');
            return $query;       
        }

        function crear($data){
        $this->db->insert('tipo_parto',array('tippar_descripcion' => $data['descripcion'],
                                            'tippar_abreviatura' => $data['abreviacion'],
                                            'tippar_estado' => 1 ));
        }
        function editar($data){
            $datos=array('tippar_descripcion' => $data['descripcion'],
                        'tippar_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('tippar_id',$data['id']);
            $query=$this->db->update('tipo_parto',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('tippar_estado' => 0   );
            $this->db->where('tippar_id',$id);
            $query=$this->db->update('tipo_parto',$datos);
            return $query;
        }

    }
?>