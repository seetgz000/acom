<?php
class Term_And_Condition_model extends CI_Model {
    
    public function get_all() {
        $this->db->select('*');
        $this->db->from('term_and_condition');
        $this->db->where('deleted = 0');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_where($where) {
        $this->db->select('*');
        $this->db->from('term_and_condition');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function add($input) {
		
		$input = json_decode($input, false);
				
		for($i=0;$i<sizeof($input->term_and_condition_description);$i++)
		{
			$data = array(
            "term_and_condition_header" => $input->term_and_condition_header,
			"term_and_condition_description" => $input->term_and_condition_description[$i]
			);
			$this->db->insert('term_and_condition', $data);
		}
		
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
        $this->db->update('term_and_condition', $data);
    }
}
?>