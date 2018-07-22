<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Label extends CI_Controller{
  public function __construct() {
      parent::__construct();
      $this->load->model("Label_model");
      $this->page_data = array();
  }

  function index(){
    $this->page_data['label_data'] = $this->Label_model->get_all();
    $this->load->view('admin/header', $this->page_data);
    $this->load->view('admin/Label/all');
    $this->load->view('admin/footer');
  }

  function update(){
     print_r($this->input->post());
     $this->Label_model->update_all($_POST['data']);
  }
}
?>
