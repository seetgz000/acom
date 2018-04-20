<?php

class Banner_model extends CI_Model {

    public function get_all() {
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $data = array(
            "url" => $input['banner'],
            "link" => $input['link']
        );

        $this->db->insert('banner', $data);

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
        $this->db->update('banner', $data);
    }

}

?>