<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Collection extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Category_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['categories'] = $this->Category_model->get_all();

        $i = 0;
        foreach ($this->page_data['categories'] as $row) {
            if ($row['parent_id'] == 0) {
                $this->page_data['categories'][$i]['parent_name'] = "None";
            } else {
                $where = array(
                    'category_id' => $row['parent_id']
                );

                $parent = $this->Category_model->get_where($where);

                $this->page_data['categories'][$i]['parent_name'] = $parent[0]['name'];
            }
            $i++;
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Category/all');
        $this->load->view('admin/footer');
    }

    public function add() {

        $where = array(
            'parent_id' => 0,
            'deleted' => 0
        );

        $this->page_data['categories'] = $this->Category_model->get_where($where);

        if ($_POST) {
            $input = $this->input->post();

            $this->Category_model->add($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Category/add');
        $this->load->view('admin/footer');
    }

    public function delete($category_id) {
        $where = array(
            'category_id' => $category_id
        );

        $data = array(
            'deleted' => 1
        );

        $this->Category_model->update_where($where, $data);

        $where = array(
            'parent_id' => $category_id
        );

        $data = array(
            'parent_id' => 0
        );

        $this->Category_model->update_where($where, $data);

        redirect('category', 'refresh');
    }

    public function edit($category_id) {

        $where = array(
            'category_id' => $category_id
        );

        $category = $this->Category_model->get_where($where);

        $this->page_data['category'] = $category[0];

        $this->page_data['category_id'] = $category_id;

        $where = array(
            'parent_id' => 0,
            'deleted' => 0,
        );

        $this->page_data['categories'] = $this->Category_model->get_where_not_self($where, $category_id);

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'category_id' => $category_id
            );

            $data = array(
                'name' => $input['name']
            );

            if ($input['parent_id'] == "none") {
                $data['parent_id'] = "0";
            } else {
                $data['parent_id'] = $input['parent_id'];
            }

            $this->Category_model->update_where($where, $data);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Category/edit');
        $this->load->view('admin/footer');
    }

}
