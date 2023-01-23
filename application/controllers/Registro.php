<?php
    class Registro extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Registro_model');
        }
        
        public function index(){
            $this->load->view('view_registrar');
        }

        public function registrar(){
            $datos = array(
                'nombre' => strtoupper(trim($this->input->post('nombre'))),
                'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
                'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
                'email' => trim($this->input->post('email')),
                'password' => sha1(trim($this->input->post('pwd')))
            );
    
            if($this->Registro_model->comprobarCorreo($datos['email'])){
                echo 'El Correo esta registrado';
            }else{
                $result = $this->Registro_model->insert($datos);
                if ($result == TRUE){
                    redirect('Auth');
                }else{
                    echo 'Contacta a soporte';
                }
            }
        }

    }
?>