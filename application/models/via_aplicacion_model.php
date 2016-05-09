<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Via_aplicacion_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('viaap_estado',1);
            $query=$this->db->get('via_aplicacion');
            return $query;
        }

        function selectId($id){
            $this->db->where('viaap_id',$id);
            $query=$this->db->get('via_aplicacion');
            return $query;       
        }
        function crear($data){
        $this->db->insert('via_aplicacion',array('viaap_descripcion' => $data['descripcion'],
                                            'viaap_abreviatura' => $data['abreviacion'],
                                            'viaap_estado' => 1 ));
        }
        function editar($data){
            $datos=array('viaap_descripcion' => $data['descripcion'],
                        'viaap_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('viaap_id',$data['id']);
            $query=$this->db->update('via_aplicacion',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('viaap_estado' => 0   );
            $this->db->where('viaap_id',$id);
            $query=$this->db->update('via_aplicacion',$datos);
            return $query;
        }

    }
?>