<?php

class Log_model extends CI_Model {

    public function get_all($where = array()) {
        $this->db->select('log.*,user.username');
        $this->db->from('log');
        $this->db->where($where);
        $this->db->join('user', 'log.user_id = user.user_id', 'left');
        $this->db->order_by('log.log_id DESC');

        $query = $this->db->get();



        $logs = $query->result_array();

        for ($i = 0; $i < count($logs); $i++) {
            $logs[$i]['created_date'] = DATE("d M Y g:i a", strtotime($logs[$i]['created_date']));
            switch ($logs[$i]['log_action_id']) {
                case 1 : // access/login
                    $loginInfo = $this->db->get_where("login_history", array(
                                "log_id" => $logs[$i]['log_id']
                            ))->result_array();
                    $logs[$i]['data'] = $loginInfo;
                    break;

                case 2 : // user/add

                    $logs[$i]['link'] = site_url("User/user_details/" . $logs[$i]['parameter']);
                    break;
                case 3 : // user/edit

                    $sql = "SELECT *,(SELECT name FROM role where role.role_id = user_history.role_id) as role FROM user_history WHERE log_id = ?";
                    $logs[$i]['link'] = site_url("User/history/" . $logs[$i]['log_id']);
                    $history = $this->db->query($sql, array(
                                $logs[$i]['log_id']
                            ))->result_array();

                    if ($history) {
                        $history = $history[0];
                        if ($history['changes'] != "") {
                            $changes = json_decode($history['changes']);
                            $logs[$i]['description'] .= "<br /> Fields : ";
                            foreach ($changes as $item) {
                                $item = $this->get_user_field_description($item);
                                if (strlen($item) > 25) {
                                    $logs[$i]['description'] .= "<br />";
                                }
                                $logs[$i]['description'] .= $item . ",";
                            }
                            $logs[$i]['description'] = substr($logs[$i]['description'], 0, strlen($logs[$i]['description']) - 1);
                        }
                    }

                    break;
                case 4 : //visitor/add
                    $logs[$i]['link'] = site_url("Visitor/details/" . $logs[$i]['parameter']);

                    break;
                case 5 : //visitor/assign
                    break;
                case 6 : //visitor/edit

                    $this->load->model("Visitor_model");
                    $logs[$i]['link'] = site_url("Visitor/history/" . $logs[$i]['log_id']);
                    $history = $this->Visitor_model->get_history($logs[$i]['log_id']);

                    if ($history) {
                        $history = $history[0];
                        if ($history['changes'] != "") {
                            $changes = json_decode($history['changes']);
                            $logs[$i]['description'] .= "<br /> Fields : ";
                            foreach ($changes as $item) {
                                $item = $this->get_visitor_field_description($item);
                                if (strlen($item) > 25) {
                                    $logs[$i]['description'] .= "<br />";
                                }
                                $logs[$i]['description'] .= $item . ",";
                            }
                            $logs[$i]['description'] = substr($logs[$i]['description'], 0, strlen($logs[$i]['description']) - 1);
                        }
                    }
                    break;
                case 7 : //visitor/feedback
                    $logs[$i]['description'] = "<a href='#' data-toggle='modal' data-target='#showFeedback_modal' data-feedbackid='" . json_decode($logs[$i]['parameter'])->feedback_id . "' class='showFeedback' >"
                            . "" . $logs[$i]["description"] . "</a>";
                    break;
                case 8 : // visitor/add_follow_up
                    $logs[$i]['link'] = site_url("Visitor/follow_up/" . $logs[$i]['parameter']);
                    break;
                case 9 : // visitor/add_follow_up_notes

                    $follow_up = $this->db->get_where("visitor_follow_up_notes", array(
                                "id" => $logs[$i]['parameter']
                            ))->result_array();

                    if (count($follow_up)) {
                        $logs[$i]['link'] = site_url("Visitor/follow_up/" . $follow_up[0]['follow_up_id']) . "?notes=" . $logs[$i]['parameter'];
                    }
                    break;


                case 12 : // visitor/edit_follow_up

                    $follow_up = $this->db->get_where("visitor_follow_up_history", array(
                                "log_id" => $logs[$i]['log_id']
                            ))->result_array()[0];

                    if ($follow_up['changes'] != "") {
                        $changes = json_decode($follow_up['changes']);
                        $logs[$i]['description'] .= "<br /> Fields : ";
                        foreach ($changes as $item) {
                            $item = $this->get_follow_up_field_description($item);
                            $logs[$i]['description'] .= $item . ",";
                        }
                        $logs[$i]['description'] = substr($logs[$i]['description'], 0, strlen($logs[$i]['description']) - 1);
                    }
                    $logs[$i]['link'] = site_url("Visitor/followUpHistory/" . $logs[$i]['log_id']);
                    break;
                case 13: //visitor/follow_up_status
                    $logs[$i]['link'] = site_url("Visitor/follow_up/" . $logs[$i]['parameter']);
                    break;
            }
        }



        return $logs;
    }

    function get_visitor_field_description($field_name) {
        $labels = array(
            "added_date" => "Visitor card filled up date",
            "age_group" => "age group",
            "marital_status" => "Marital Status",
            "first_time" => "first time visiting",
            "christian" => "is christian",
            "invited_by" => "invited by",
            "prayer_for" => "I need a prayer for",
            "not_welcomed" => "not welcomed",
            "reason_not_welcomed" => "reason not welcomed",
            "visit_date" => "visit date",
            "feedback_status" => "visitor status"
        );

        if (isset($labels[$field_name])) {
            return $labels[$field_name];
        }

        return $field_name;
    }

    function get_follow_up_field_description($field_name) {
        $labels = array(
            "follow_up_time" => "follow Up Time",
            "follow_up_date" => "follow Up Date",
            "before_notes" => "before notes"
        );

        if (isset($labels[$field_name])) {
            return $labels[$field_name];
        }

        return $field_name;
    }

    function get_user_field_description($field_name) {
        $labels = array(
            "first_name" => "first name",
            "last_name" => "last name",
            "role_id" => "role"
        );

        if (isset($labels[$field_name])) {
            return $labels[$field_name];
        }

        return $field_name;
    }

}

?>