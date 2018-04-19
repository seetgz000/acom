<?php

class Logger extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // call when login success
    function access($function, $param_1 = "", $param_2 = "", $param3 = "") {
        $action_id = $this->db->get_where("log_action", array(
                    "module" => "access",
                    "function" => $function
                ))->result_array()[0]['id'];

        switch ($function) {
            case "login":
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Log In",
                    "log_action_id" => $action_id
                ));
                $log_id = $this->db->insert_id();
                $this->db->insert("login_history", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "log_id" => $log_id,
                    "ip_address" => $param_2,
                    "browser_type" => $param3
                ));
                break;
        }
    }

    function user($function, $param_1 = "", $param_2 = "", $param_3 = "") {
        $action_id = $this->db->get_where("log_action", array(
                    "module" => "user",
                    "function" => $function
                ))->result_array()[0]['id'];

        switch ($function) {
            // param_1 : user_id
            case "add":
                $admin = $this->db->get_where("user", array("user_id" => $param_1))->result_array();
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Create User : " . $admin[0]['username'],
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
                $log_id = $this->db->insert_id();

                $user = $this->db->get_where("user", array(
                            "user_id" => $param_1
                        ))->result_array()[0];
                $user['log_id'] = $log_id;

                $this->db->insert("user_history", $user);
                break;

            case "edit": // parma_1 : user_id , param_2: username
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Edit user : " . $param_2,
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
                $log_id = $this->db->insert_id();

              return $log_id;
                break;
            case "delete":
                echo $param_1;
                $admin = $this->db->get_where("user", array("user_id" => $param_1))->result_array();
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Delete user : " . $admin[0]['username'],
                    "log_action_id" => $action_id
                ));
                break;
            /*
              case "edit":
              $this->db->insert("log", array(
              "user_id" => $this->session->userdata("user_id"),
              "description" => "Edit own user profile",
              "log_action_id" => $log_id
              ));
              break;
             * 
             */
        }
    }

    function visitor($function, $param_1 = "", $param_2 = "", $param_3 = "") {
        $action_id = $this->db->get_where("log_action", array(
                    "module" => "visitor",
                    "function" => $function
                ))->result_array()[0]['id'];

        switch ($function) {
            // param_1 = name , param_2 = 'visitor_id'
            case "add":
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Create visitor " . $param_1,
                    "parameter" => $param_2,
                    "log_action_id" => $action_id
                ));
                break;
            case "assign": //param 1 :user, param_2 visitor
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Assigned visitor to user id : " . $param_1,
                    "parameter" => json_encode(array(
                        "user" => $param_1,
                        "visitor" => $param_2
                    )),
                    "log_action_id" => $action_id
                ));
                break;
            case "edit" :
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Edit visitor information :" . $param_1,
                    "parameter" => $param_2,
                    "log_action_id" => $action_id
                ));
                break;

            // param_1 feedback  id

            case "feedback" :
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Added remarks to visitor",
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
                break;

            case "add_follow_up":
                // param_1 : visitor Name
                // param_ 2 : log_id
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Created follow up for visitor : " . $param_1,
                    "parameter" => $param_2,
                    "log_action_id" => $action_id
                ));

                break;
            case "add_follow_up_notes":
                // param_1 : follow _Up_id , param_2 : follow_up_notes_id
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Respond to follow up #" . $param_1,
                    "parameter" => $param_2,
                    "log_action_id" => $action_id
                ));
                break;
            case "edit_follow_up":
                // param 1 : follow_up_id
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Changes to follow up #" . $param_1,
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
                break;
            case "follow_up_status": // param_1 : follow_up_id, param_2 : action
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Changed to follow up #" . $param_1 . " status to : " . $param_2,
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
                break;
            case "delete":
                $visitor = $this->db->get_where("visitor",array(
                    "visitor_id" => $param_1
                ))->result_array();
                
               $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Deleted visitor ".$visitor[0]['name'],
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
        }

        return $this->db->insert_id();
    }

    function settings($function, $param_1 = "", $param_2 = "", $param_3 = "") {
        switch ($function) {
            // param_1 : selection name
            case "add_selection":
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "add selection on card " . $param_1,
                    "parameter" => $param_1
                ));
                $log_id = $this->db->insert_id();

                break;

            // param_1 : selection name
            case "delete_selection":
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Remove selection on card " . $param_1,
                    "parameter" => $param_1
                ));
                $log_id = $this->db->insert_id();

                break;
        }
    }

    function role($function, $param_1 = "", $param_2 = "", $param_3 = "") {
        $action_id = $this->db->get_where("log_action", array(
                    "module" => "role",
                    "function" => $function
                ))->result_array()[0]['id'];

        switch ($function) {
            case "add":
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Added new role " . $param_2,
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
                break;
            case "edit" :
                $this->db->insert("log", array(
                    "user_id" => $this->session->userdata("user_id"),
                    "description" => "Edit role " . $param_2,
                    "parameter" => $param_1,
                    "log_action_id" => $action_id
                ));
                break;
        }

        return $this->db->insert_id();
    }

}

?>
