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
    $shippingDetails = $this->ShippingDetails_model->get_all();
    $i = 0;
		$shippingResult=array();
      foreach ($shippingDetails as $row) {
          $where = array(
              'name' => $row['name']
          );
          $shippingResult[$row['name']] = $this->ShippingDetails_model->get_where($where);
          $i++;
      }
      $this->page_data['shippingDetails'] = $shippingResult;


    $this->load->view('admin/header', $this->page_data);
    $this->load->view('admin/ShippingDetails/all');
    $this->load->view('admin/footer');
  }
  function all(){
    $shippingDetails = $this->ShippingDetails_model->get_all();
    $i = 0;
		$shippingResult=array();
      foreach ($shippingDetails as $row) {
          $where = array(
              'name' => $row['name']
          );
          $shippingResult[$row['name']] = $this->ShippingDetails_model->get_where($where);
          $i++;
      }
      $this->page_data['shippingDetails'] = $shippingResult;

    $this->load->view('admin/header', $this->page_data);
    $this->load->view('admin/ShippingDetails/all');
    $this->load->view('admin/footer');
  }
  function edit(){
		if ($_POST) {
				$input = $this->input->post();

				$this->ShippingDetails_model->update_all($input['data']);
				die(json_encode(array(
						"status" => true
				)));
		}
    $shippingDetails = $this->ShippingDetails_model->get_all();
    $i = 0;
		$shippingResult=array();
      foreach ($shippingDetails as $row) {
          $where = array(
              'name' => $row['name']
          );
          $shippingResult[$row['name']] = $this->ShippingDetails_model->get_where($where);
          $i++;
      }
      $this->page_data['shippingDetails'] = $shippingResult;


    $this->load->view('admin/header', $this->page_data);
    $this->load->view('admin/ShippingDetails/edit');
    $this->load->view('admin/footer');
  }

  function update(){
     print_r($this->input->post());
     $this->ShippingDetails_model->update_all($_POST['data']);
  }
}
?>
