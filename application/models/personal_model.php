<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Personal_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function select(){
            $this->db->where('per_estado',1);
            $query=$this->db->get('personal');
            return $query;
            
        }

        function selectId($id){
            $this->db->where('per_id',$id);
            $query=$this->db->get('personal');
            return $query;
       
        }
        function crear($data){
            $this->db->insert('personal',array(
                                            'per_dni' => $data['dni'],
                                            'per_nombre' => $data['nombre'],
                                            'per_ape_paterno' => $data['paterno'],
                                            'per_ape_materno' => $data['materno'],
                                            'per_direccion' => $data['direccion'],
                                            'per_telefono' => $data['telefono'],
                                            'per_estado' => 1,
                                            'per_distrito' => $data['distrito']));
        }
        

        function editar($data){

            $datos=array(
                        'per_dni' => $data['dni'],
                        'per_nombre' => $data['nombre'],
                        'per_ape_paterno' => $data['paterno'],
                        'per_ape_materno' => $data['materno'],
                        'per_direccion' => $data['direccion'],
                        'per_telefono' => $data['telefono'],
                        'per_estado' => 1,
                        'per_distrito' => $data['distrito']
                        );
            $this->db->where('per_id',$data['id']);
            $query=$this->db->update('personal',$datos);
            return $query;

        }

        function eliminar($id){
            $datos=array('per_estado' => 0   );
            $this->db->where('per_id',$id);
            $query=$this->db->update('personal',$datos);
            return $query;
        }
        
    }
?>