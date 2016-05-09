<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Sexo_cria_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('sexcr_estado',1);
            $query=$this->db->get('sexo_cria');
            return $query;
        }

        function selectId($id){
            $this->db->where('sexcr_id',$id);
            $query=$this->db->get('sexo_cria');
            return $query;       
        }
        function crear($data){
        $this->db->insert('sexo_cria',array('sexcr_descripcion' => $data['descripcion'],
                                            'sexcr_estado' => 1,
                                            'sexcr_codigo' => $data['codigo'],
                                            'sexcr_abreviatura' => $data['abreviacion']));
        }
        function editar($data){
            $datos=array('sexcr_descripcion' => $data['descripcion'],
                        'sexcr_codigo' => $data['codigo'],
                        'sexcr_abreviatura' => $data['abreviacion'],
                        );
            $this->db->where('sexcr_id',$data['id']);
            $query=$this->db->update('sexo_cria',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('sexcr_estado' => 0   );
            $this->db->where('sexcr_id',$id);
            $query=$this->db->update('sexo_cria',$datos);
            return $query;
        }

    }
?>