<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Medicacion_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('med_estado',1);
            $query=$this->db->get('medicacion');
            return $query;
            
        }

        function selectId($id){
            $this->db->where('med_id',$id);
            $query=$this->db->get('medicacion');
            return $query;
       
        }
        /*
        function crear($data){
            $this->db->insert('raza',array('raz_descripcion' => $data['descripcion'],
                                            'raz_abreviacion' => $data['abreviacion'],
                                            'raz_estado' => 1 ));
        }

        function editar($data){
            $datos=array('raz_descripcion' => $data['descripcion'],
                        'raz_abreviacion' => $data['abreviacion']
                        );
            $this->db->where('raz_id',$data['id']);
            $query=$this->db->update('raza',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('raz_estado' => 0   );
            $this->db->where('raz_id',$id);
            $query=$this->db->update('raza',$datos);
            return $query;
        }*/

    }
?>