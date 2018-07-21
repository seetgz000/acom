<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Admin_model");
        $this->load->model("Role_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['admins'] = $this->Admin_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Admin/all');
        $this->load->view('admin/footer');
    }

    function add() {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if ($input['password'] != $input['password2']) {
                $error = true;
                $error_message = "Passwords do not match";
            }

            $where = array(
                'referrer_code' => $input['referrer_code']
            );

            $admin = $this->Admin_model->get_where($where);

            if(count($admin) > 0){
                $error = true;
                $error_message = "This referrer code is already taken by another user";
            }

            if (!$error) {
                $this->Admin_model->add($input);

                die(json_encode(array(
                    "status" => true
                )));
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $error_message
                )));
            }
        }

        $this->page_data['role'] = $this->Role_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Admin/add");
        $this->load->view("admin/footer");
    }

    public function details($admin_id) {
        $where = array(
            "admin_id" => $admin_id
        );

        $admin = $this->Admin_model->get_where($where);

        $this->page_data['admin'] = $admin[0];

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Admin/details');
        $this->load->view('admin/footer');
    }

    public function edit($admin_id) {
        $where = array(
            "admin_id" => $admin_id
        );

        $admin = $this->Admin_model->get_where($where);

        $this->page_data['role'] = $this->Role_model->get_all();

        $this->page_data['admin'] = $admin[0];

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if ($_POST['password'] OR $_POST['password2']) {
                if ($input['password'] != $input['password2']) {
                    $error = true;
                    $error_message = "Passwords do not match";
                }
            } else {
                $input['password'] = $admin['0']['password'];
                $input['salt'] = $admin['0']['salt'];
            }

            if (!$error) {
                $this->Admin_model->update($admin_id, $input);

                die(json_encode(array(
                    "status" => true
                )));
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $error_message
                )));
            }
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Admin/edit');
        $this->load->view('admin/footer');
    }

    public function delete($admin_id){
        $this->Admin_model->delete($admin_id);

        redirect('admin', 'refresh');
    }

}
