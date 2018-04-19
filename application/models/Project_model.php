<?php

class Project_model extends CI_Model {

    function __construct() {
        parent ::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('user', 'project.created_by = user.user_id', "left");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function add_project($input) {

        $required = array(
            "name",
            "date",
            "unit_number",
            "buyer",
            "selling_price",
            "spa_price",
            "sales_package",
            "net_price",
            "spa_date",
            "la_date",
            "total_commission",
            "company_commission",
            "ren_commission",
            "pic"
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
            $user_id = $this->session->userdata('user_id');

            $data = array(
                "name" => $input['name'],
                "date" => date("Y-m-d", strtotime($input['date'])),
                "unit_number" => $input['unit_number'],
                "buyer" => $input['buyer'],
                "selling_price" => $input['selling_price'],
                "spa_price" => $input['spa_price'],
                "sales_package" => $input['sales_package'],
                "net_price" => date("Y-m-d", strtotime($input['net_price'])),
                "spa_date" => date("Y-m-d", strtotime($input['spa_date'])),
                "la_date" => $input['la_date'],
                "total_commission" => $input['total_commission'],
                "company_commission" => $input['company_commission'],
                "ren_commission" => $input['ren_commission'],
                "pic" => $input['pic'],
                "remarks" => $input['remarks'],
                "created_by" => $user_id
            );

            $role_id = $this->session->userdata('role_id');

            if ($role_id <= 4) {
                $data['approved_by'] = $user_id;
                $data['approved_date'] = date("Y-m-d");
            } else {
                $data['approved_by'] = 0;
            }

            $this->db->insert('project', $data);

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

    public function add_project_ren($input) {
        $required = array(
            "user_id",
            "percentage",
            "commission_rate",
            "leader_id",
            "leader_percentage"
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
                "message" => $error_message,
                "array" => $input,
            )));
        } else {

            $ren_num = count($input['user_id']);

            for ($i = 0; $i < $ren_num; $i++) {
                $data = array(
                    "user_id" => $input['user_id'][$i],
                    "percentage" => $input['percentage'][$i],
                    "commission_rate" => $input['commission_rate'][$i],
                    "leader_id" => $input['leader_id'][$i],
                    "leader_percentage" => $input['leader_percentage'][$i],
                    "type" => "REN",
                    "project_id" => $input['project_id']
                );

                $this->db->insert('agent_project', $data);

                if ($this->db->affected_rows() == 0) {
                    die(json_encode(array(
                        "status" => false,
                        "message" => "Insert Error"
                    )));
                }
            }
        }
    }

    public function add_project_ref($input) {
        $required = array(
            "ref_user_id",
            "ref_percentage",
            "ref_commission_rate",
            "ref_leader_id",
            "ref_leader_percentage"
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

            $data = array(
                "user_id" => $input['ref_user_id'],
                "percentage" => $input['ref_percentage'],
                "commission_rate" => $input['ref_commission_rate'],
                "leader_id" => $input['ref_leader_id'],
                "leader_percentage" => $input['ref_leader_percentage'],
                "type" => "referral",
                "project_id" => $input['project_id']
            );

            $this->db->insert('agent_project', $data);

            if ($this->db->affected_rows() == 0) {
                die(json_encode(array(
                    "status" => false,
                    "message" => "Insert Error"
                )));
            }
        }
    }

}

?>