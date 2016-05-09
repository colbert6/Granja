<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Medicina_cuarto_mamarios_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('mecu_estado',1);
            $query=$this->db->get('medi_cuartos_mamarios');
            return $query;
        }

        function selectId($id){
            $this->db->where('mecu_id',$id);
            $query=$this->db->get('medi_cuartos_mamarios');
            return $query;       
        }
        function crear($data){
        $this->db->insert('medi_cuartos_mamarios',array('mecu_descripcion' => $data['descripcion'],
                                            'mecu_abreviatura' => $data['abreviacion'],
                                            'mecu_estado' => 1 ));
        }
        function editar($data){
            $datos=array('mecu_descripcion' => $data['descripcion'],
                        'mecu_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('mecu_id',$data['id']);
            $query=$this->db->update('medi_cuartos_mamarios',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('mecu_estado' => 0   );
            $this->db->where('mecu_id',$id);
            $query=$this->db->update('medi_cuartos_mamarios',$datos);
            return $query;
        }

    }
?>