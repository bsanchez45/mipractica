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
            
        }

        public function listar(){
            $data = $this->Perfiles_model->readData();
            echo json_encode($data);
        }
    }
?>