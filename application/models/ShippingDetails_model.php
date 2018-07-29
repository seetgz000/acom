<?php
class ShippingDetails_model extends CI_Model {
    function __construct() {
        parent ::__construct();
    }
    public function get_all() {
      $this->db->select('*');
      $this->db->from('shipping_details');
      $this->db->group_by('name');
      $this->db->order_by('shipping_details_id', 'ASC');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function get_where($where) {
      $this->db->select('*');
      $this->db->from('shipping_details');
      $this->db->where($where);
      $query = $this->db->get();
      return $query->result_array();
  }
    public function update_all($arr){
      $this->db->select('name');
      $this->db->order_by('name', 'DESC');
      $max_g_id = $this->db->get('shipping_details')->result_array();

      print_r($max_g_id);
      foreach($arr as $var){
        if($var['type']=='up'){
          if($var['id']<0){
            $name_var=($var['name']>0)?$var['name']:($max_g_id[0]['name']+$var['name']*-1);
            $this->db->insert('shipping_details', array(
              'name'=>$name_var,
              'value'=>$var['value']
            ));
          }else{
            $up=array(
              'value'=>$var['value']
            );
            $this->db->where('shipping_details_id',$var['id']);
            $this->db->update('shipping_details', $up);
          }
        }else if($var['type']=='del'){
          $this->db->delete('shipping_details', array('shipping_details_id' => $var['id']));
        }
      }
    }
}
