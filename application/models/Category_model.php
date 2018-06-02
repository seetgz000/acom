<?php

class Category_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }
    public function get_child() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('deleted = 0');
        $this->db->where('parent_id != 0');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $required = array(
            "name"
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
            if ($input['parent_id'] == "none") {
                $input['parent_id'] = "0";
            }

            $data = array(
                "name" => $input['name'],
                "parent_id" => $input['parent_id']
            );

            $this->db->insert('category', $data);

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
        $this->db->update("category", $data);
    }

    public function get_where_not_self($where, $category_id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id !=', $category_id);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}
