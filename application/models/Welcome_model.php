<?php

class Welcome_model extends CI_Model {

    function __construct() {
        parent::__construct();
        #$this->load->database();
    }

    private $table  = 'preregistros' ;

    public function readData()
    {
        $rstQuery = $this->db->get($this->table);
        return $rstQuery->result_array();
    }

    public function fetch($id)
    {
        $rstQuery = $this->db->get_where($this->table, array('id_preregistro' => $id));
        return $rstQuery->row_array();
        
    }

    public function getRol(){
        $data = $this->db->get("roles");
        return $data->result_array();
    }

    public function update($id, $data){
        $this->db->where('id_preregistro', $id);
        $isOkey = $this->db->update($this->table, $data);
        return ($isOkey == true) ? true : false;
    }

	public function delete($id){
		$this->db->delete($this->table, array('id_preregistro' => $id));
	}

}
