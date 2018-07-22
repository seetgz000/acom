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


    public function update_all($arr){

      foreach($arr as $var){
        $id = $var['id'];
        $data=array(
          'Value'=>$var['name']
        );
        $this->db->where('label_id', $id);
        $this->db->update('label', $data);
      }
    }
}
