<?php

class Order_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }

    public function get_all(){
        $this->db->select('*, user.username, order_status.status AS status');
        $this->db->from('order');
        $this->db->join('user', 'order.user_id = user.user_id', 'left');
        $this->db->join('order_status', 'order.order_status_id = order_status.order_status_id', 'left');
        $this->db->join('promotion', 'order.promotion_id = promotion.promotion_id', 'left');
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function add_order($data) {
        $this->db->insert('order', $data);

        return $this->db->insert_id();
    }

    public function add_order_items($order_id) {
        $cart = $this->session->userdata('cart');

        foreach ($cart as $row) {
            $data = array(
                'order_id' => $order_id,
                'product_id' => $row['product_id'],
                'price' => $row['price'],
                'quantity' => $row['quantity'],
                'model_id' => $row['model_id'],
            );
            
            $this->db->insert('order_details', $data);
        }
    }
    
    public function get_where($where){
        $this->db->select('order.*, user.username, order_status.status AS status, promotion.code, promotion.discount');
        $this->db->from('order');
        $this->db->join('user', 'order.user_id = user.user_id', 'left');
        $this->db->join('order_status', 'order.order_status_id = order_status.order_status_id', 'left');
        $this->db->join('promotion', 'order.promotion_id = promotion.promotion_id', 'left');
        $this->db->where($where);
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_order_products($where){
        $this->db->select('*, product.name AS product_name, (order_details.quantity * order_details.price) AS total');
        $this->db->from('order_details');
        $this->db->join('product', 'order_details.product_id = product.product_id', 'left');
        $this->db->join('product_model', 'order_details.model_id = product_model.model_id', 'left');
        $this->db->where($where);
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_all_status(){
        $this->db->select('*');
        $this->db->from('order_status');
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function update_where($where, $data){
        $this->db->where($where);
        $this->db->update('order', $data);
    }

}

?>