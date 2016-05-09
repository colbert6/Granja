<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Medicina_genital_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('medge_estado',1);
            $query=$this->db->get('medicina_genital');
            return $query;
        }

        function selectId($id){
            $this->db->where('medge_id',$id);
            $query=$this->db->get('medicina_genital');
            return $query;       
        }
        function crear($data){
        $this->db->insert('medicina_genital',array('medge_descripcion' => $data['descripcion'],
                                            'medge_abreviatura' => $data['abreviacion'],
                                            'medge_estado' => 1 ));
        }
        function editar($data){
            $datos=array('medge_descripcion' => $data['descripcion'],
                        'medge_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('medge_id',$data['id']);
            $query=$this->db->update('medicina_genital',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('medge_estado' => 0   );
            $this->db->where('medge_id',$id);
            $query=$this->db->update('medicina_genital',$datos);
            return $query;
        }

    }
?>