<?php

class IndexPic_model extends CI_Model {

    public function get_all() {
        $this->db->select('*');
        $this->db->from('index_pic');
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where) {
        $this->db->select('*');
        $this->db->from('index_pic');
        $this->db->where('deleted = 0');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function update_where($where, $input) {
        $this->db->where($where);
        $this->db->update('index_pic', $input);
    }

}

?>