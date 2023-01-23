<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->has_userdata('id_user')){
			redirect('Auth');
		}
		$this->load->model('Welcome_model');
	}
	
	public function index(){
		redirect('Welcome/listar');
	}

	public function listar(){
		#print_r($this->Welcome_model->readData());
		$data['preregistros'] = $this->Welcome_model->readData();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('view_registro', $data);
		$this->load->view('templates/footer');
	}


	public function actualizar($id){
		$data['preregistro'] = $this->Welcome_model->fetch($id);
		if($this->session->userdata('rol') == 1){
			$data['roles'] = $this->Welcome_model->getRol();
		}
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('view_editar', $data);
		$this->load->view('templates/footer');
	}

	public function eliminar($id){
		$this->Welcome_model->delete($id);
		redirect('Welcome/listar');
	}

	public function update(){
		$datos = array(
			'nombre' => strtoupper(trim($this->input->post('nombre'))),
			'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
			'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
			'email' => trim($this->input->post('email'))
		);
		$id = $this->input->post('id_preregistro');

		if($this->session->userdata('rol') == 1){
			$datos['rol'] = $this->input->post('rol');
		}

		$result = $this->Welcome_model->update($id, $datos);
		if ($result == TRUE) {
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}
	}
}
