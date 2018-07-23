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
        if($var['type']=='del'){
            $this->db->delete('label',array(
              'label_id'=>$var['id']
            ));
            $this->db->where('label', $var['id']);
            $this->db->update('product', array(
              'label'=>4
            ));
        }else if($var['id']<0){
            $this->db->insert('label', array(
              'Name'=>$var['mark'],
              'Value'=>$var['name'],
              'w_color'=>'#ffffff',
              'b_color'=>'#000000'
            ));
        }else{
          $id = $var['id'];
          if(!in_array($var['id'],array(1,2,3))){
            $data=array(
              'Name'=>$var['mark'],
              'Value'=>$var['name']
            );
          }else{
            $data=array(
              'Value'=>$var['name']
            );
          }

          $this->db->where('label_id', $id);
          $this->db->update('label', $data);
        }

      }
    }
}
