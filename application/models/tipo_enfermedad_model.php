<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tipo_enfermedad_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('tipen_estado',1);
            $query=$this->db->get('tipo_enfermedad');
            return $query;
        }

        function selectId($id){
            $this->db->where('tipen_id',$id);
            $query=$this->db->get('tipo_enfermedad');
            return $query;       
        }
        function crear($data){
        $this->db->insert('Tipo_enfermedad',array('tipen_descripcion' => $data['descripcion'],
                                            'tipen_abreviatura' => $data['abreviacion'],
                                            'tipen_estado' => 1 ));
        }
        function editar($data){
            $datos=array('tipen_descripcion' => $data['descripcion'],
                        'tipen_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('tipen_id',$data['id']);
            $query=$this->db->update('tipo_enfermedad',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('tipen_estado' => 0   );
            $this->db->where('tipen_id',$id);
            $query=$this->db->update('Tipo_enfermedad',$datos);
            return $query;
        }

    }
?>