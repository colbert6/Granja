<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Enfermedad_ovario_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('enfov_estado',1);
            $query=$this->db->get('enfermedad_ovario');
            return $query;
        }

        function selectId($id){
            $this->db->where('enfov_id',$id);
            $query=$this->db->get('enfermedad_ovario');
            return $query;       
        }
        function crear($data){
        $this->db->insert('enfermedad_ovario',array('enfov_descripcion' => $data['descripcion'],
                                            'enfov_abreviatura' => $data['abreviacion'],
                                            'enfov_estado' => 1 ));
        }
        function editar($data){
            $datos=array('enfov_descripcion' => $data['descripcion'],
                        'enfov_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('enfov_id',$data['id']);
            $query=$this->db->update('enfermedad_ovario',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('enfov_estado' => 0   );
            $this->db->where('enfov_id',$id);
            $query=$this->db->update('enfermedad_ovario',$datos);
            return $query;
        }

    }
?>