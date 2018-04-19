<?php

class Selection_on_card_model extends CI_Model {

    public function get_interest() {
        $this->db->select('*');
        $this->db->from('selection_on_card');
        $this->db->where('type = "interest"');
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function get_options() {
        $this->db->select('*');
        $this->db->from('selection_on_card');
        $this->db->where('type = "options"');
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function get_all(){
        $this->db->select('*');
        $this->db->from('selection_on_card');
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function update_where($data, $where){
        $this->db->where($where);
        $this->db->update('selection_on_card', $data);
    }
    
    public function insert($data){
        $this->db->insert('selection_on_card', $data);
    }

}
