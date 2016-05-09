<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Causa_no_inseminal_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('cni_estado',1);
            $query=$this->db->get('causa_no_inseminal');
            return $query;
        }

        function selectId($id){
            $this->db->where('cni_id',$id);
            $query=$this->db->get('causa_no_inseminal');
            return $query;       
        }
        function crear($data){
        $this->db->insert('causa_no_inseminal',array('cni_descripcion' => $data['descripcion'],
                                            'cni_abreviatura' => $data['abreviacion'],
                                            'cni_estado' => 1 ));
        }
        function editar($data){
            $datos=array('cni_descripcion' => $data['descripcion'],
                        'cni_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('cni_id',$data['id']);
            $query=$this->db->update('causa_no_inseminal',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('cni_estado' => 0   );
            $this->db->where('cni_id',$id);
            $query=$this->db->update('causa_no_inseminal',$datos);
            return $query;
        }
    }
?>