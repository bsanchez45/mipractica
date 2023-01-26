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

    public function fetch($id){
        $query = $this->db->get_where($this->table, $id);
        return $query->row_array();
    }

    public function update($id, $data){
        $this->db->where('id_rol', $id);
        $isOkey = $this->db->update($this->table, $data);
        return ($isOkey == true) ? true : false;
    }

    public function countUserRol($id){
        $this->db->where('rol', $id);
        $query = $this->db->get('preregistros');
        return $query->num_rows();
    }

    public function delete($id){
		$this->db->delete($this->table, $id);
	}
}

?>