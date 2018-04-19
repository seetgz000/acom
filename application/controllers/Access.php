<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Access extends CI_Controller {

    public function login() {
        $data = array();

        if ($_POST) {

            $sql = "SELECT username, admin_id,deleted, role_id FROM admin "
                    . "WHERE username = ? AND password = SHA2(CONCAT(salt, ?),512);";


            $result = $this->db->query($sql, array(
                        $this->input->post('username'),
                        $this->input->post('password')
                    ))->result_array();


            if (count($result)) {
                if ($result[0]['deleted'] == '0') {

                    $this->session->set_userdata(array(
                        'admin_id' => $result[0]['admin_id'],
                        'role_id' => $result[0]['role_id'],
                        'username' => $result[0]['username']
                    ));

                    redirect("admin", "refresh");
                } else {
                    $data['error'] = 'Account deactivated';
                }
            } else {
                $data['error'] = 'Invalid username and password';
            }
        }

        $this->load->view('access/header', $data);
        $this->load->view('access/login');
        $this->load->view('access/footer');
    }

    public function logout() {
        // 
        $this->session->sess_destroy();
        redirect('access/login');
    }

    public function reset_password() {

        if (empty($this->session->userdata['user_id'])) {
            redirect("access/login");
        }

        $data = array();

        if ($_POST) {

            $input = $this->input->post();

            $required = array(
                'password',
                'password2'
            );

            $error = false;

            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = true;
                }
            }

            if ($_POST['password']) {
                if (!$_POST['password2']) {
                    $error = true;
                    $data['error'] = "Please do not leave confirm password empty";
                } else if ($_POST['password'] != $_POST['password2']) {
                    $error = true;
                    $data['error'] = "Passwords do not match";
                } else {
                    $new_password = $input['password'];
                }
            }

            if ($error) {
                if (empty($data)) {
                    $data['error'] = "Please do not leave any field empty";
                }
            } else {



                $salt = rand(10000000, 99999999);

                $user_id = $this->session->userdata['user_id'];

                $sql = "UPDATE user SET salt = ?, password = SHA2(CONCAT(?, ?), 512), plain_password = NULL "
                        . "WHERE user_id = $user_id";

                $update = array(
                    $salt,
                    $salt,
                    $new_password
                );

                $this->db->query($sql, $update);

                $role_id = $this->session->userdata['role_id'];

                redirect("user", "refresh");
            }
        }

        $this->load->view('access/header', $data);
        $this->load->view('access/reset_password');
        $this->load->view('access/footer');
    }

}
