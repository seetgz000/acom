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
        $this->load->model("Collection_model");
        $this->page_data = array();
    }
    public function index() {
        $this->page_data['collection'] = $this->Collection_model->get_all();
        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Collection/all');
        $this->load->view('admin/footer');
    }
    public function edit($collection_id) {
        $where = array(
            'collection_id' => $collection_id
        );
        $collection = $this->Collection_model->get_where($where);
        $this->page_data['collection'] = $collection[0];
        $this->page_data['collection_id'] = $collection_id;
        if ($_POST) {
            $input = $this->input->post();
            $where = array(
                'collection_id' => $collection_id
            );
            $this->Collection_model->update_where($where, $input);
            die(json_encode(array(
                "status" => true
            )));
        }
        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Collection/edit');
        $this->load->view('admin/footer');
    }
    public function add() {

        $where = array(
            'deleted' => 0
        );

        $this->page_data['collection'] = $this->Collection_model->get_where($where);

        if ($_POST) {
            $input = $this->input->post();

            $this->Collection_model->add($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Collection/add');
        $this->load->view('admin/footer');
    }
    public function delete($collection_id) {
        $where = array(
            "collection_id" => $collection_id
        );
        
        $data = array(
            "deleted" => 1
        );
        
        $this->Collection_model->update_where($where, $data);
        
        redirect('collection', 'refresh');
    }
}