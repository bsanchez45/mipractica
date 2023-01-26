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
            $data['nombre'] = $this->input->post('perfil');
            if($this->input->post('action') == "nuevo"){
                $request = $this->Perfiles_model->insert($data);
                if($request){
                    echo json_encode("Se guardo el perfil correctamente");
                }else{
                    echo json_encode("No se pudo guardar el perfil");
                }
            }else if($this->input->post('action') == "editar"){
                $request = $this->Perfiles_model->update($this->input->post('id_perfil'), $data);
                if($request){
                    echo json_encode("Se actualizo el perfil correctamente");
                }else{
                    echo json_encode("No se pudo actualizar el perfil");
                }
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

        public function delete(){
            $resp['id_rol'] = $this->input->post('idBack');
            $count = $this->Perfiles_model->countUserRol($resp['id_rol']);
            if($count > 0){
                echo json_encode(" Error - No se puede eliminar el rol, ya que está siendo utilizado por al menos un usuario");
            }else{
                $this->Perfiles_model->delete($resp);
                echo json_encode("Perfil eliminado correctamente");
            }
        }
    }
?>