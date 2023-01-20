<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Welcome_model'); //aqui cargamos nuetro modelo
		// include 
	}
	
	public function index(){
		$this->load->view('view_header');
		$this->load->view('welcome_message');
		$this->load->view('view_footer');
	}

	public function listar(){
		#print_r($this->Welcome_model->readData());
		$data['preregistros'] = $this->Welcome_model->readData();
		$this->load->view('view_header');
		$this->load->view('view_registro', $data);
		$this->load->view('view_footer');
	}

	public function registrar(){
		$datos = array(
			'nombre' => strtoupper(trim($this->input->post('nombre'))),
			'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
			'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
			'email' => trim($this->input->post('email')),
			'password' => sha1(trim($this->input->post('pwd')))
		);

		if($this->Welcome_model->comprobarCorreo($datos['email'])){
			echo 'El Correo esta registrado';
		}else{
			$result = $this->Welcome_model->insert($datos);
			if ($result == TRUE){
				redirect('Welcome/listar');
			}else{
				echo 'Contacta a soporte';
			}
		}
	}

	public function actualizar($id){
		$data['preregistro'] = $this->Welcome_model->fetch($id);
		$this->load->view('view_header');
		$this->load->view('view_editar', $data);
		$this->load->view('view_footer');
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
			'email' => trim($this->input->post('email')),
			'password' => sha1(trim($this->input->post('pwd')))
		);
		$id = $this->input->post('id_preregistro');

		if($this->Welcome_model->comprobarCorreo($datos['email'])){
			echo 'El Correo esta registrado';
		}else{
			$result = $this->Welcome_model->update($id, $datos);
			if ($result == TRUE) {
				redirect('Welcome/listar');
			}else{
				echo 'Contacta a soporte';
			}
		}
	}
}
