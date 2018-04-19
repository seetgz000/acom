<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Product_model");
        $this->load->model("Category_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['products'] = $this->Product_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Product/all');
        $this->load->view('admin/footer');
    }

    public function add() {

        $this->page_data['categories'] = $this->Category_model->get_all();

        if ($_POST) {

            $input = $this->input->post();

            if (!empty($_FILES['thumbnail']['name'])) {
                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path" => "./images/Product/",
                    "path" => "/images/Product/");

                $this->load->library("upload", $config);
                if ($this->upload->do_upload("thumbnail")) {
                    $thumbnail = $config['path'] . $this->upload->data()['file_name'];
                } else {
                    die(json_encode(array(
                        "status" => false,
                        "message" => $this->upload->display_errors()
                    )));
                }
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Please upload a thumbnail."
                )));
            }

            $input['thumbnail'] = $thumbnail;

            $product_id = $this->Product_model->add($input);

            $input['product_id'] = $product_id;

            $this->Product_model->add_model($input);

            if ($_FILES["images"]['error'][0] != 4) {
                if (!empty($_FILES['images']['name'])) {
                    $files_count = count($_FILES["images"]['name']);

                    for ($i = 0; $i < $files_count; $i++) {
                        $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                        $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                        $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                        $_FILES['image']['error'] = $_FILES['images']['error'][$i];
                        $_FILES['image']['size'] = $_FILES['images']['size'][$i];

                        $config = array(
                            "allowed_types" => "gif|png|jpg|jpeg",
                            "upload_path" => "./images/Product/",
                            "path" => "/images/Product/");

                        $this->load->library("upload", $config);

                        if ($this->upload->do_upload('image')) {
                            $url = $config['path'] . $this->upload->data()['file_name'];

                            $this->Product_model->add_image($url, $product_id);
                        } else {
                            die(json_encode(array(
                                "status" => false,
                                "message" => $this->upload->display_errors()
                            )));
                        }
                    }
                }
            }

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Product/add');
        $this->load->view('admin/footer');
    }

    public function details($product_id) {
        $where = array(
            'product_id' => $product_id
        );

        $product = $this->Product_model->get_where($where);

        $this->page_data['product'] = $product[0];

        $this->page_data['models'] = $this->Product_model->get_product_models_where($where);

        $this->page_data['images'] = $this->Product_model->get_product_images_where($where);

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Product/details');
        $this->load->view('admin/footer');
    }

    public function edit_details($product_id) {
        $where = array(
            'product_id' => $product_id
        );

        $product = $this->Product_model->get_where($where);

        $this->page_data['product'] = $product[0];

        $this->page_data['categories'] = $this->Category_model->get_all();

        if ($_POST) {
            $input = $this->input->post();

            if (!empty($_FILES['thumbnail']['name'])) {
                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path" => "./images/Product/",
                    "path" => "/images/Product/");

                $this->load->library("upload", $config);
                if ($this->upload->do_upload("thumbnail")) {
                    $thumbnail = $config['path'] . $this->upload->data()['file_name'];
                } else {
                    die(json_encode(array(
                        "status" => false,
                        "message" => $this->upload->display_errors()
                    )));
                }
            } else {
                $thumbnail = $product[0]['thumbnail'];
            }


            $input['thumbnail'] = $thumbnail;

            $this->Product_model->update($product_id, $input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Product/edit_details');
        $this->load->view('admin/footer');
    }

    public function edit_images($product_id) {
        $where = array(
            'product_id' => $product_id
        );

        $this->page_data['images'] = $this->Product_model->get_product_images_where($where);

        $this->page_data['product_id'] = $product_id;

        if ($_FILES) {

            if (!empty($_FILES['images']['error'][0] != 4)) {
                if (!empty($_FILES['images']['name'])) {
                    $files_count = count($_FILES["images"]['name']);

                    for ($i = 0; $i < $files_count; $i++) {
                        $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                        $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                        $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                        $_FILES['image']['error'] = $_FILES['images']['error'][$i];
                        $_FILES['image']['size'] = $_FILES['images']['size'][$i];

                        $config = array(
                            "allowed_types" => "gif|png|jpg|jpeg",
                            "upload_path" => "./images/Product/",
                            "path" => "/images/Product/");

                        $this->load->library("upload", $config);

                        if ($this->upload->do_upload('image')) {
                            $url = $config['path'] . $this->upload->data()['file_name'];

                            $this->Product_model->add_image($url, $product_id);
                        } else {
                            die(json_encode(array(
                                "status" => false,
                                "message" => $this->upload->display_errors()
                            )));
                        }
                    }
                }
            }


            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Product/edit_images');
        $this->load->view('admin/footer');
    }

    public function delete_image($image_id) {

        $where = array(
            "image_id" => $image_id
        );


        $image = $this->Product_model->get_product_images_where($where);

        $product_id = $image[0]['product_id'];

        $this->Product_model->delete_image($where);

        redirect('product/edit_images/' . $product_id, 'refresh');
    }

    public function add_models($product_id) {
        $where = array(
            'product_id' => $product_id
        );

        $this->page_data['product_id'] = $product_id;

        $this->page_data['models'] = $this->Product_model->get_product_models_where($where);

        if ($_POST) {

            $input = $this->input->post();

            $input['product_id'] = $product_id;

            $this->Product_model->add_model($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Product/add_models');
        $this->load->view('admin/footer');
    }

    public function delete_model($model_id) {
        $where = array(
            'model_id' => $model_id
        );

        $data = array(
            "deleted" => 1
        );

        $model = $this->Product_model->get_product_models_where($where);

        $product_id = $model[0]['product_id'];

        $this->Product_model->update_model_where($where, $data);

        redirect('product/details/' . $product_id, 'refresh');
    }

    public function edit_model($model_id) {
        $where = array(
            'model_id' => $model_id
        );

        $model = $this->Product_model->get_product_models_where($where);

        $this->page_data['model'] = $model[0];

        $product_id = $model[0]['product_id'];

        $this->page_data['product_id'] = $product_id;

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'model_id' => $model_id
            );

            $data = array(
                "model" => $input['model'],
                "SKU" => $input['sku']
            );

            $this->Product_model->update_model_where($where, $data);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Product/edit_model');
        $this->load->view('admin/footer');
    }

    public function delete($product_id) {
        $where = array(
            "product_id" => $product_id
        );

        $data = array(
            "deleted" => 1
        );

        $this->Product_model->update_where($where, $data);

        redirect("product", "refresh");
    }

}
