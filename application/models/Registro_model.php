<?php
    class Registro_model extends CI_Model{

        private $table = 'preregistros';

        public function __construct(){
            parent::__construct();
        }

        public function insert($data)
        {
            $isOkey = $this->db->insert($this->table, $data);
            return ($isOkey == true) ? true : false;
        }

        public function comprobarCorreo($email){
            $query = $this->db->get_where($this->table, array('email' => $email));
        
            if($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
?>