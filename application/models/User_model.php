<?php

class User_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }
    
    public function get_all(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('deleted = 0');
        
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('deleted = 0');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $salt = rand(10000000, 99999999);
        $sql = "INSERT INTO user(username,salt,password, name, referrer_code) "
                . "VALUES ( ?, ?, SHA2(CONCAT(?, ?),512), ?, ?)";
        $insert = array(
            $input['username'],
            $salt,
            $salt,
            $input['password'],
            $input['name'],
            $input['referrer_code']
        );
        $this->db->query($sql, $insert);

        return $this->db->insert_id();
    }
    
    public function update_where($where, $data){
        $this->db->where($where);
        $this->db->update('user', $data);
    }

}

?>