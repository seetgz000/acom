<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class ShippingDetails extends CI_Controller{
  public function __construct() {
      parent::__construct();
      $this->load->model("ShippingDetails_model");
      $this->page_data = array();
  }

  function index(){
    $this->page_data['shippingDetails'] = $this->ShippingDetails_model->get_all();
    $this->load->view('admin/header', $this->page_data);
    $this->load->view('admin/shippingDetails/all');
    $this->load->view('admin/footer');
  }

  function update(){
     print_r($this->input->post());
     $this->ShippingDetails_model->update_all($_POST['data']);
  }
}
?>
