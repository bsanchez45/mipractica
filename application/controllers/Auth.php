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
                    $user = array(
                        'id_user' => $dbresult['id_preregistro'],
                        'rol' => $dbresult['rol']
                    );
                    $this->session->set_userdata($user);
                    redirect('Welcome/listar');
                }else{
                    echo "Contraseña incorrecta";
                }
            }
        }

        public function logout(){
            $user = array(
                'id_user',
                'rol'
            );
            $this->session->unset_userdata($user);
            redirect("Auth");
        }
    }
?>