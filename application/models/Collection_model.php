<?php
class Collection_model extends CI_Model {
    
    public function get_all() {
        $this->db->select('*');
        $this->db->from('collection');
        $this->db->where('deleted = 0');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_where($where) {
        $this->db->select('*');
        $this->db->from('collection');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function add($input) {
        $data = array(
            "collection_name" => $input['collection_name']
        );
        $this->db->insert('collection', $data);
        if ($this->db->affected_rows() == 0) {
            die(json_encode(array(
                "status" => false,
                "message" => "Insert Error"
            )));
        } else {
            return $this->db->insert_id();
        }
    }
    public function update_where($where, $data) {
        $this->db->where($where);
        $this->db->update('collection', $data);
    }
}
?>