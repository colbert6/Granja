<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Medicamentos_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('medi_estado',1);
            $query=$this->db->get('medicamentos');
            return $query;
        }

        function selectId($id){
            $this->db->where('medi_id',$id);
            $query=$this->db->get('medicamentos');
            return $query;       
        }
        function crear($data){
        $this->db->insert('medicamentos',array('medi_descripcion' => $data['descripcion'],
                                            'medi_abreviatura' => $data['abreviacion'],
                                            'medi_estado' => 1 ));
        }
        function editar($data){
            $datos=array('medi_descripcion' => $data['descripcion'],
                        'medi_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('medi_id',$data['id']);
            $query=$this->db->update('medicamentos',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('medi_estado' => 0   );
            $this->db->where('medi_id',$id);
            $query=$this->db->update('medicamentos',$datos);
            return $query;
        }

    }
?>