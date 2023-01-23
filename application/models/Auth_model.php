<?php
    class Auth_model extends CI_Model{

        private $table = 'preregistros';

        public function __construct(){
            parent::__construct();
        }

        public function getData($email){
            $data = $this->db->get_where($this->table, array('email' => $email));
            return $data->row_array();
        }
    }
?>