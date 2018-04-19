<?php

class Agent_model extends CI_Model {

    public function add($input) {
//        $required = array(
//            "ic",
//            "date_of_birth",
//            "bank",
//            "bank_acc",
//            "branch_id",
//            "current_stay",
//            "register_area_id"
//        );

        $error = false;

//        foreach ($required as $field) {
//            if (empty($_POST[$field])) {
//                $error = true;
//                $error_message = "Please do not leave " . $field . " empty";
//            }
//        }

        if ($error) {
            die(json_encode(array(
                "status" => false,
                "message" => $error_message
            )));
        } else {
            $data = array(
                "user_id" => $input['user_id'],
                "ic" => $input['ic'],
                "date_of_birth" => $input['date_of_birth'],
                "bank" => $input['bank'],
                "bank_acc" => $input['bank_acc'],
                "branch_id" => $input['branch_id'],
                "referrer_id" => $input['referrer_id'],
                "current_stay" => $input['current_stay'],
                "focus_area" => $input['focus_area'],
                "suggestion" => $input['suggestion'],
                "register_area_id" => $input['register_area_id']
            );

            $this->db->insert('agent', $data);

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

    public function update($input, $user_id) {
        $required = array(
            "ic",
            "date_of_birth",
            "bank",
            "bank_acc",
            "branch_id",
            "current_stay",
            "focus_area",
            "register_area_id"
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
                "ic" => $input['ic'],
                "date_of_birth" => $input['date_of_birth'],
                "bank" => $input['bank'],
                "bank_acc" => $input['bank_acc'],
                "branch_id" => $input['branch_id'],
                "referrer_id" => $input['referrer_id'],
                "current_stay" => $input['current_stay'],
                "focus_area" => $input['focus_area'],
                "suggestion" => $input['suggestion'],
                "register_area_id" => $input['register_area_id']
            );


            if ($this->session->userdata['user_id'] == $user_id) {
                $data['completed'] = 1;

                $this->session->set_userdata(array(
                    'completed' => 1,
                ));
            }

            $this->db->where('user_id', $user_id);
            $this->db->update('agent', $data);


            return $this->db->insert_id();
        }
    }

}

?>