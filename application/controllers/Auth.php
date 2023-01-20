<?php
    class Auth extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Auth_model');
        } 

        public function index(){
            $this->load->view('view_login');
        }

        public function iniciar(){
            $datos = array(
                'email' => trim($this->input->post('email')),
                'password' => sha1(trim($this->input->post('pwd')))
            );
            $dbresult = $this->Auth_model->getData($datos['email']);

            if(empty($dbresult)){
                echo "El correo no existe";
            }else{
                if($datos['password'] == $dbresult['password']){
                    redirect('Welcome');
                }else{
                    echo "Contraseña incorrecta";
                }
            }
        }
    }
?>