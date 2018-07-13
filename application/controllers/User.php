<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("User_model");
        $this->load->model("Order_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['users'] = $this->User_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/User/all');
        $this->load->view('admin/footer');
    }

    public function details($user_id) {
        $where = array(
            'user.user_id' => $user_id
        );

        $user = $this->User_model->get_where($where);

        $this->page_data['user'] = $user[0];

        $order = $this->Order_model->get_where($where);

        $i = 0;
        foreach ($order as $row) {
            $where = array(
                'order_id' => $row['order_id']
            );

            $products = $this->Order_model->get_order_products($where);

            $product_total = 0;
            $total = 0;

            $product_count = 0;
            foreach ($products as $product_row) {

                if ($product_row['discount_price'] > 0) {
                    $product_price = $product_row['discount_price'];
                 } else { 
                     $product_price = $product_row['price']; 
                }

                $product_total = ($product_price * $product_row['quantity']);

                $total = $total + $product_total;

                $products[$product_count]['product_total'] = $product_total;

                $product_count++;
            }

            $order[$i]['products'] = $products;
            
            if (!empty($order[$i]['discount'])) {
                $order[$i]['total'] = $total * ((100 - $order[$i]['discount']) / 100);
            } else {
                $order[$i]['total'] = $total;
            }
            $order[$i]['total'] = $order[$i]['total'] + $order[$i]['shipping'];
            $i++;
        }

        $this->page_data['order'] = $order;

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/User/details');
        $this->load->view('admin/footer');
    }
    
    public function delete($user_id){
        $where = array(
            'user_id' => $user_id
        );
        
        $data = array(
            'deleted' => 1
        );
        
        $this->User_model->update_where($where, $data);
        
        print_r($this->db->last_query());
        
        redirect('user', 'refresh');
    }

}
