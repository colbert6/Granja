<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Causa_rechazo_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('cr_esta',1);
            $query=$this->db->get('causa_rechazo');
            return $query;
        }

        function selectId($id){
            $this->db->where('cr_id',$id);
            $query=$this->db->get('causa_rechazo');
            return $query;       
        }
        function crear($data){
        $this->db->insert('causa_rechazo',array('cr_descripcion' => $data['descripcion'],
                                            'cr_abreviatura' => $data['abreviacion'],
                                            'cr_esta' => 1 ));
        }
        function editar($data){
            $datos=array('cr_descripcion' => $data['descripcion'],
                        'cr_abreviatura' => $data['abreviacion']
                        );
            $this->db->where('cr_id',$data['id']);
            $query=$this->db->update('causa_rechazo',$datos);
            return $query;
        }
        function eliminar($id){
            $datos=array('cr_esta' => 0 );
            $this->db->where('cr_id',$id);
            $query=$this->db->update('causa_rechazo',$datos);
            return $query;
        }

    }
?>