<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Banner_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['banners'] = $this->Banner_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Banner/all');
        $this->load->view('admin/footer');
    }

    public function add() {

        if ($_POST) {
            $input = $this->input->post();

            if (!empty($_FILES['banner']['name'])) {
                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path" => "./images/Banner/",
                    "path" => "/images/Banner/");

                $this->load->library("upload", $config);
                if ($this->upload->do_upload("banner")) {
                    $banner = $config['path'] . $this->upload->data()['file_name'];
                } else {
                    die(json_encode(array(
                        "status" => false,
                        "message" => $this->upload->display_errors()
                    )));
                }
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Please upload a banner."
                )));
            }

            $input['banner'] = $banner;

            $this->Banner_model->add($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Banner/add');
        $this->load->view('admin/footer');
    }

    public function delete($banner_id) {
        $where = array(
            "banner_id" => $banner_id
        );
        
        $data = array(
            "deleted" => 1
        );
        
        $this->Banner_model->update_where($where, $data);
        
        redirect('banner', 'refresh');
    }

}
