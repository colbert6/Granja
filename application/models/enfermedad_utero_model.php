<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Enfermedad_utero_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('enfut_estado',1);
            $query=$this->db->get('enfermedad_utero');
            return $query;
        }

        function selectId($id){
            $this->db->where('enfut_id',$id);
            $query=$this->db->get('enfermedad_utero');
            return $query;       
        }
        function crear($data){
        $this->db->insert('enfermedad_utero',array('enfut_descripcion' => $data['descripcion'],
                                            'enfut_abreviatura' => $data['abreviacion'],
                                            'enfut_estado' => 1 ));
        }
        function editar($data){
            $datos=array('enfut_descripcion' => $data['descripcion'],
                        'enfut_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('enfut_id',$data['id']);
            $query=$this->db->update('enfermedad_utero',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('enfut_estado' => 0   );
            $this->db->where('enfut_id',$id);
            $query=$this->db->update('enfermedad_utero',$datos);
            return $query;
        }

    }
?>