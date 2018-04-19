<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Promotion_model");
        $this->page_data = array();
    }

    public function index() {

        $this->page_data['promotions'] = $this->Promotion_model->get_all();

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Promotion/all');
        $this->load->view('admin/footer');
    }

    public function add() {

        $code = substr(str_shuffle("QWERTYUIOPASDFGHJKLZXCVBNM123456789"), 0, 12);

        $this->page_data['code'] = $code;

        if ($_POST) {
            $input = $this->input->post();

            $this->Promotion_model->add($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Promotion/add');
        $this->load->view('admin/footer');
    }

    public function deactivate($promotion_id) {
        
        $data = array(
            'active' => "NO"
        );
        
        $where = array(
            'promotion_id' => $promotion_id
        );
        
        $this->Promotion_model->update_where($where, $data);
        
        redirect("Promotion", "refresh");
    }
    
    public function reactivate($promotion_id) {
        
        $data = array(
            'active' => "YES"
        );
        
        $where = array(
            'promotion_id' => $promotion_id
        );
        
        $this->Promotion_model->update_where($where, $data);
        
        redirect("Promotion", "refresh");
    }
    
    public function delete($promotion_id) {
        
        $data = array(
            'deleted' => 1
        );
        
        $where = array(
            'promotion_id' => $promotion_id
        );
        
        $this->Promotion_model->update_where($where, $data);
        
        redirect("Promotion", "refresh");
    }

}
