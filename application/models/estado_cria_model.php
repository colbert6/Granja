<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Estado_cria_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('estcr_estado',1);
            $query=$this->db->get('estado_cria');
            return $query;
        }

        function selectId($id){
            $this->db->where('estcr_id',$id);
            $query=$this->db->get('estado_cria');
            return $query;       
        }
        function crear($data){
        $this->db->insert('estado_cria',array('estcr_descripcion' => $data['descripcion'],
                                            'estcr_abreviatura' => $data['abreviacion'],
                                            'estcr_estado' => 1 ));
        }
        function editar($data){
            $datos=array('estcr_descripcion' => $data['descripcion'],
                        'estcr_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('estcr_id',$data['id']);
            $query=$this->db->update('estado_cria',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('estcr_estado' => 0   );
            $this->db->where('estcr_id',$id);
            $query=$this->db->update('estado_cria',$datos);
            return $query;
        }

    }
?>