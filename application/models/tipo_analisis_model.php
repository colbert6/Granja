<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tipo_analisis_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('tipan_estado',1);
            $query=$this->db->get('tipo_analisis');
            return $query;
        }

        function selectId($id){
            $this->db->where('tipan_id',$id);
            $query=$this->db->get('tipo_analisis');
            return $query;       
        }
        function crear($data){
        $this->db->insert('tipo_analisis',array('tipan_descripcion' => $data['descripcion'],
                                            'tipan_abreviatura' => $data['abreviacion'],
                                            'tipan_estado' => 1 ));
        }
        function editar($data){
            $datos=array('tipan_descripcion' => $data['descripcion'],
                        'tipan_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('tipan_id',$data['id']);
            $query=$this->db->update('tipo_analisis',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('tipan_estado' => 0   );
            $this->db->where('tipan_id',$id);
            $query=$this->db->update('tipo_analisis',$datos);
            return $query;
        }

    }
?>