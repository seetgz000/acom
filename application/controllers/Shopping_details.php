<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shopping_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Shopping_details_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['shopping_details'] = $this->Shopping_details_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Shopping_details/all');
        $this->load->view('admin/footer');
    }

    public function edit($shopping_details_id) {

        $where = array(
            'shopping_details_id' => $shopping_details_id
        );

        $shopping_details = $this->Shopping_details_model->get_where($where);

        $this->page_data['shopping_details'] = $shopping_details;

        $this->page_data['shopping_details_id'] = $shopping_details_id;

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'shopping_details_id' => $shopping_details_id
            );

            $data = array(
                "deleted" => 1
            );

            $this->Shopping_details_model->update_where($where, $data);

            $this->Shopping_details_model->add($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Shopping_details/edit');
        $this->load->view('admin/footer');
    }

}
