<?php

class Connector_model extends CI_Model{
    
    function __construct(){
       // $this->load->model("Logger");
    }
    
    function visitor_by_connector(){
        $visitors = $this->db->get_where("visitor",array(
            "assigned_to" => $this->session->userdata("user_id")
        ))->result_array();
        
        return $visitors;
    }
    
    function update_vistor_info($visitor_id,$data){
        $this->db->where("visitor_id",$visitor_id);
        $this->db->update("visitor",$data);
       
    }
    
    function visitor_feedback($feedback){
        $this->db->insert("visitor_feedback",$feedback);
        
        return $this->db->insert_id();
    }
    
    
}

