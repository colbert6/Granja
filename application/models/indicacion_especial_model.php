<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Indicacion_especial_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('indesp_estado',1);
            $query=$this->db->get('indicaciones_especiales');
            return $query;
        }

        function selectId($id){
            $this->db->where('indesp_id',$id);
            $query=$this->db->get('indicaciones_especiales');
            return $query;       
        }
        function crear($data){
        $this->db->insert('indicaciones_especiales',array('indesp_descripcion' => $data['descripcion'],
                                            'indesp_abreviatura' => $data['abreviacion'],
                                            'indesp_estado' => 1 ));
        }
        function editar($data){
            $datos=array('indesp_descripcion' => $data['descripcion'],
                        'indesp_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('indesP_id',$data['id']);
            $query=$this->db->update('indicaciones_especiales',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('indesp_estado' => 0   );
            $this->db->where('indesp_id',$id);
            $query=$this->db->update('indicaciones_especiales',$datos);
            return $query;
        }

    }
?>