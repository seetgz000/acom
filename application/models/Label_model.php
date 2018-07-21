<?php

class Label_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('label');
        $query = $this->db->get();

        return $query->result_array();
    }



}
