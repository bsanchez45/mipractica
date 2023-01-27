<?php

class Practica extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function viewPruebas(){
        $this->load->view("view_pruebas");
    }

    public function registrar(){
        $messageData = array('success' => false, 'messages' => array());
        $datos = array(
			array('field' => 'nombre', 'label' => 'nombre', 'rules' => 'required|trim'),
            array('field' => 'apaterno', 'label' => 'apaterno', 'rules' => 'required|trim'),
            array('field' => 'amaterno', 'label' => 'amaterno', 'rules' => 'required|trim'),
            array('field' => 'email', 'label' => 'email', 'rules' => 'required|trim|valid_email|is_unique[preregistros.email]'),
            array('field' => 'pwd', 'label' => 'pwd', 'rules' => 'required|trim'),
            array('field' => 'pwd2', 'label' => 'pwd2', 'rules' => 'required|trim|matches[pwd]')
		);
        $this->form_validation->set_rules($datos);
        $this->form_validation->set_error_delimiters('<p class="text-warning">', '</p>');
        
        if ($this->form_validation->run() == FALSE)
        {
            $messageData['success'] = false;
            foreach ($_POST as $key => $value) {
                $messageData['messages'][$key] = form_error($key);
            }
            echo json_encode($messageData);
        }
        else
        {
            echo "entra si es verdadero";
        }
    }
}
?>