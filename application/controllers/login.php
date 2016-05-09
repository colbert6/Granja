<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Login extends CI_Controller
    {   
        var $tabla='login';//auditoria

        function __construct(){
            parent::__construct();
            $this->load->model('login_model');
        }

    	public function index()
        {
         
            $user	= $this->input->post('user');
            $password	= $this->input->post('password');

            $login=$this->login_model->selectUser($user);

            if($login != null){
                if($login->usu_password==$password){
                    $data= array(
                        'user' => $user, 
                        'id' => $login->usu_id, 
                        'login'=>true,
                        'nombre'=>$login->per_nombre,
                        'apell_p'=>$login->per_ape_paterno,
                        'apell_m'=>$login->per_ape_materno,
                        'tipo_usu'=>$login->tipusu_id,
                        'tipo_usuario'=>$login->tipusu_descripcion
                    );
                    $this->session->set_userdata($data);
                    $this->auditoria('inciar sesion',$this->tabla,'',$login->usu_id);//auditoria
                    redirect('', 'refresh');

                }else{
                   redirect('', 'refresh');
                    
                }

            }else{
               redirect('', 'refresh');

            }

        }

        public function cerrar()
        {
            $this->auditoria('cerrar sesion',$this->tabla,'',$this->session->userdata('tipo_usu'));//auditoria
            $this->session->sess_destroy();
            redirect('', 'refresh');
        
        } 


    }


?>