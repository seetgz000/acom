<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shipping_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Shipping_details_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['shipping_details'] = $this->Shipping_details_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Shipping_details/all');
        $this->load->view('admin/footer');
    }

    public function edit($shipping_details_id) {

        $where = array(
            'shipping_details_id' => $shipping_details_id
        );

        $shipping_details = $this->Shipping_details_model->get_where($where);

        $this->page_data['shipping_details'] = $shipping_details;

        $this->page_data['shipping_details_id'] = $shipping_details_id;

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'shipping_details_id' => $shipping_details_id
            );

            $data = array(
                "deleted" => 1
            );

            $this->Shipping_details_model->update_where($where, $data);

            $this->Shipping_details_model->add($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Shipping_details/edit');
        $this->load->view('admin/footer');
    }

}
