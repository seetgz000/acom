<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class TermAndCondition extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('role_id')) {
            //var_dump($this->session->all_userdata());
            redirect("access/logout", "refresh");
        }
        $this->load->model("Term_And_Condition_model");
        $this->page_data = array();
    }
    public function index() {
        $this->page_data['term_and_condition'] = $this->Term_And_Condition_model->get_all();
        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Term_And_Condition/all');
        $this->load->view('admin/footer');
    }
    public function all() {
        $this->page_data['term_and_condition'] = $this->Term_And_Condition_model->get_all();
        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Term_And_Condition/all');
        $this->load->view('admin/footer');
    }
    public function edit($term_and_condition_id) {
        if ($_POST) {
            $input = $this->input->post();

            $this->Term_And_Condition_model->update_all($input['data']);
            die(json_encode(array(
                "status" => true
            )));
        }
        $where = array(
            'term_and_condition_id' => $term_and_condition_id

        );
        $term_and_condition = $this->Term_And_Condition_model->get_where($where);
        $result_header = $term_and_condition[0]['term_and_condition_header'];
        $term_and_condition = $this->Term_And_Condition_model->get_where(array(
          'term_and_condition_header'=>$result_header,
          'deleted' => 0
        ));

        $this->page_data['term_and_condition'] = $term_and_condition;
        $this->page_data['term_and_condition_id'] = $term_and_condition_id;

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Term_And_Condition/edit');
        $this->load->view('admin/footer');
    }
    public function add() {

        $where = array(
            'deleted' => 0
        );

        $this->page_data['Term_And_Condition'] = $this->Term_And_Condition_model->get_where($where);

        if (isset($_POST['newTermAndConditionString'])) {
            $input = $_POST['newTermAndConditionString'];

            $this->Term_And_Condition_model->add($input);

            die(json_encode(array(
                "status" => true
            )));
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/Term_And_Condition/add');
        $this->load->view('admin/footer');
    }
    public function delete($term_and_condition_id) {
        $where = array(
            "term_and_condition_id" => $term_and_condition_id
        );

        $data = array(
            "deleted" => 1
        );

        $this->Term_And_Condition_model->update_where($where, $data);

        redirect('TermAndCondition', 'refresh');
    }
}
