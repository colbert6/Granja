<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Resultado_analisis_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('resan_estado',1);
            $query=$this->db->get('resultado_analisis');
            return $query;
        }

        function selectId($id){
            $this->db->where('resan_id',$id);
            $query=$this->db->get('resultado_analisis');
            return $query;       
        }
        function crear($data){
        $this->db->insert('resultado_analisis',array('resan_descripcion' => $data['descripcion'],
                                            'resan_abreviatura' => $data['abreviacion'],
                                            'resan_estado' => 1 ));
        }
        function editar($data){
            $datos=array('resan_descripcion' => $data['descripcion'],
                        'resan_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('resan_id',$data['id']);
            $query=$this->db->update('resultado_analisis',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('resan_estado' => 0   );
            $this->db->where('resan_id',$id);
            $query=$this->db->update('resultado_analisis',$datos);
            return $query;
        }

    }
?>