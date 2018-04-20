<?php

class Promotion_model extends CI_Model {

    public function get_all() {
        $this->db->select('*');
        $this->db->from('promotion');
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $required = array(
            "name",
            "discount"
        );

        $error = false;

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
                $error_message = "Please do not leave " . $field . " empty";
            }
        }

        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message
            )));
        } else {
            $data = array(
                "name" => $input['name'],
                "description" => $input['description'],
                "code" => $input['code'],
                "discount" => $input['discount'],
            );

            $this->db->insert('promotion', $data);

            if ($this->db->affected_rows() == 0) {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Insert Error"
                )));
            } else {
                return $this->db->insert_id();
            }
        }
    }
    
    public function update_where($where, $data) {
        $this->db->where($where);
        $this->db->update('promotion', $data);
    }
    
    public function get_where($where) {
        $this->db->select('*');
        $this->db->from('promotion');
        $this->db->where('deleted = 0');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

}

?>