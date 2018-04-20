<?php

class Role_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->model("Logger");
        
    }
    public function get_all(){
        $this->db->select('*');
        $this->db->from('role');
        if($this->session->userdata['role_id'] > 1){
            $this->db->where('role.role_id >=', $this->session->userdata['role_id']);
        }
        
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function add($data){
        $this->db->insert('role', $data);
        $role_id = $this->db->insert_id();
        $this->Logger->role("add",$role_id,$data['name']);
    }
    
    public function get_where($where){
        $this->db->select('*');
        $this->db->from('role');
        $this->db->where($where);
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function update_where($data, $where){
        $this->db->where($where);
        $this->db->update('role', $data);
        
        $this->Logger->role("edit",$where['role_id'],$data['name']);
    }
    
    public function delete_where($where){
        $this->db->where($where);
        $this->db->delete('role');
    }
}

?>