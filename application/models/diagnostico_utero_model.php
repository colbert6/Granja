<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Diagnostico_utero_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('diaut_estado',1);
            $query=$this->db->get('diagnostico_utero');
            return $query;
        }

        function selectId($id){
            $this->db->where('diaut_id',$id);
            $query=$this->db->get('diagnostico_utero');
            return $query;       
        }
        function crear($data){
        $this->db->insert('diagnostico_utero',array('diaut_descripcion' => $data['descripcion'],
                                            'diaut_abreviatura' => $data['abreviacion'],
                                            'diaut_estado' => 1 ));
        }
        function editar($data){
            $datos=array('diaut_descripcion' => $data['descripcion'],
                        'diaut_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('diaut_id',$data['id']);
            $query=$this->db->update('diagnostico_utero',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('diaut_estado' => 0   );
            $this->db->where('diaut_id',$id);
            $query=$this->db->update('diagnostico_utero',$datos);
            return $query;
        }

    }
?>