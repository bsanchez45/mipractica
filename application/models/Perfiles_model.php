<?php

class Perfiles_model extends CI_Model {

    private $table  = 'roles';
    
    function __construct() {
        parent::__construct();
    }

    public function insert($data)
    {
        $isOkey = $this->db->insert($this->table, $data);
        return ($isOkey == true) ? true : false;
    }

    public function readData(){
        $rstQuery = $this->db->get("roles");
        return $rstQuery->result_array();
    }

}

?>