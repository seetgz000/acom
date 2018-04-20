<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Order_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['orders'] = $this->Order_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Order/all');
        $this->load->view('admin/footer');
    }

    public function details($order_id) {
        $where = array(
            'order_id' => $order_id
        );

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

                $product_total = ($product_row['price'] * $product_row['quantity']);

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
            $i++;
        }

        $this->page_data['order'] = $order[0];

        $this->page_data['order_status'] = $this->Order_model->get_all_status();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Order/details');
        $this->load->view('admin/footer');
    }

    public function update($order_id) {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'order_id' => $order_id
            );

            $data = array(
                'order_status_id' => $input['status'],
                'remarks' => $input['remarks']
            );

            $this->Order_model->update_where($where, $data);
        }

        redirect('order/details' . $order_id, "refresh");
    }

}
