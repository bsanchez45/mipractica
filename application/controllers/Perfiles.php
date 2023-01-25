<?php
    class Perfiles extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Perfiles_model');
        }

        public function index(){
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('view_perfiles');
            $this->load->view('templates/footer');
        }

        public function registrar(){
            print_r($_POST);
            $data['id_rol'] = $this->input->post('id_perfil');
            $data['nombre'] = $this->input->post('perfil');
            if($data['id_rol'] == ''){
                $request = $this->Perfiles_model->update($data);
            }else{
                $request = $this->Perfiles_model->insert($data);
            }
            
            if($request){
                echo json_encode("Se guardo el perfil correctamente");
            }else{
                echo json_encode("No se pudo guardar el perfil");
            }
        }

        public function listar(){
            $data = $this->Perfiles_model->readData();
            echo json_encode($data);
        }

        public function actualizar(){
            $resp['id_rol'] = $this->input->post('idBack');
            $data = $this->Perfiles_model->fetch($resp);
            echo json_encode($data);
        }
    }
?>