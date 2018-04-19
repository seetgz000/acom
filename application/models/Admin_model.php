<?php

class Admin_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }

    public function get_all() {
        $this->db->select('*, role.name AS role');
        $this->db->from('admin');
        $this->db->join('role', 'admin.role_id = role.role_id', 'left');
        $this->db->where('role.role_id >=', $this->session->userdata['role_id']);
        $this->db->where('deleted = 0');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add($input) {
        $required = array(
            "username",
            "password",
            "password2",
            "referrer_code",
            "role_id"
        );

        $error = false;

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
                $error_message = "Please do not leave " . $field . " empty";
            }
        }

        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message
            )));
        } else {
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('username =', $input['username']);

            $query = $this->db->get();

            $result = $query->result_array();

            if (count($result) > 0) {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Username already exists"
                )));
            } else {

                $this->db->select('*');
                $this->db->from('admin');
                $this->db->where('referrer_code =', $input['referrer_code']);

                $query = $this->db->get();

                $result = $query->result_array();

                if (count($result) > 0) {
                    die(json_encode(array(
                        "status" => false,
                        "message" => "This referrer code is already taken by another user"
                    )));
                } else {

                    $salt = rand(10000000, 99999999);
                    $sql = "INSERT INTO admin(username,salt,password, role_id, referrer_code) "
                            . "VALUES ( ?, ?, SHA2(CONCAT(?, ?),512), ?, ?)";
                    $insert = array(
                        $input['username'],
                        $salt,
                        $salt,
                        $input['password'],
                        $input['role_id'],
                        $input['referrer_code']
                    );
                    $this->db->query($sql, $insert);

                    if ($this->db->affected_rows() == 0) {
                        die(json_encode(array(
                            "status" => false,
                            "message" => "Insert Error"
                        )));
                    } else {
                        return $this->db->insert_id();
                    }
                }
            }
        }
    }

    public function get_where($where) {
        $this->db->select('*, role.name AS role');
        $this->db->from('admin');
        $this->db->join('role', 'admin.role_id = role.role_id', 'left');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function update($admin_id, $input) {
        $required = array(
            "username",
            "role_id",
            "referrer_code"
        );

        $error = false;

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
                $error_message = "Please do not leave " . $field . " empty";
            }
        }
        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message
            )));
        } else {
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('username =', $input['username']);
            $this->db->where('admin_id !=', $admin_id);

            $query = $this->db->get();

            $result = $query->result_array();

            if (count($result) > 0) {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Username already exists"
                )));
            } else {
                $this->db->select('*');
                $this->db->from('admin');
                $this->db->where('referrer_code =', $input['referrer_code']);
                $this->db->where('admin_id !=', $admin_id);

                $query = $this->db->get();

                $result = $query->result_array();

                if (count($result) > 0) {
                    die(json_encode(array(
                        "status" => false,
                        "message" => "This referrer code is already taken by another user"
                    )));
                } else {

                    if (isset($input['salt'])) {
                        $data = array(
                            "username" => $input['username'],
                            "password" => $input['password'],
                            "salt" => $input['salt'],
                            "role_id" => $input['role_id'],
                            'referrer_code' => $input['referrer_code']
                        );

                        $where = array(
                            'admin_id' => $admin_id
                        );

                        $this->db->where($where);
                        $this->db->update('admin', $data);
                    } else {
                        $salt = rand(10000000, 99999999);
                        $sql = "UPDATE admin SET username = ?,salt = ? ,password = SHA2(CONCAT(?, ?),512), role_id = ?, referrer_code = ?"
                                . "WHERE admin_id = $admin_id";
                        $data = array(
                            $input['username'],
                            $salt,
                            $salt,
                            $input['password'],
                            $input['role_id'],
                            $input['referrer_code']
                        );
                        $this->db->query($sql, $data);
                    }
                }
            }
        }
    }

    public function delete($admin_id) {
        $data = array(
            "deleted" => 1
        );

        $where = array(
            "admin_id" => $admin_id
        );

        $this->db->where($where);
        $this->db->update('admin', $data);
    }

}
