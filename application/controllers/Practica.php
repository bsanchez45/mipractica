<?php

class Practica extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function viewPruebas(){
        $this->load->view("view_pruebas");
    }
}
?>