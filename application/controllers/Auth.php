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
                $this->session->set_flashdata('warning', 'El correo no existe');
                redirect('Auth');
            }else{
                if($datos['password'] == $dbresult['password']){
                    $user = array(
                        'id_user' => $dbresult['id_preregistro'],
                        'nombre' => $dbresult['nombre'],
                        'rol' => $dbresult['rol']
                    );
                    $this->session->set_userdata($user);
                    $this->session->set_flashdata('success', 'Bienvenido '. $dbresult['nombre']);
                    
                    redirect('Welcome/listar');
                }else{
                    $this->session->set_flashdata('danger', 'Contraseña incorrecta');
                    redirect('Auth');
                }
            }
        }

        public function logout(){
            $user = array(
                'id_user',
                'rol'
            );
            $this->session->unset_userdata($user);
            $this->session->sess_destroy();
            redirect("Auth");
        }
    }
?>