<?php

class Visitor_model extends CI_Model {
    /*
     * THE TERM "FEEDBACK" In this module is changed to "REMARKS" 
     * ALL fields are the same, just changed to front end label
     * 
     */

    function __construct() {
        parent::__construct();

        $this->load->model("Logger");
    }

    public function get_all() {
        $this->db->select('visitor.*, user.username as added_by');
        $this->db->from('visitor');
        $this->db->join('user', 'visitor.created_by = user.user_id', 'left');
        $this->db->where("visitor.deleted", '0');
        $this->db->order_by("visitor_id", 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function edit($visitor_id, $data, $interest = null, $options = null) {

        $visitor = $this->db->get_where("visitor", array(
                    "visitor_id" => $visitor_id
                ))->result_array()[0];

        $log_id = $this->Logger->visitor('edit', $visitor['name'], $visitor_id);
        $changes = array();
        foreach ($data as $key => $value) {
            if (isset($visitor[$key])) {
                if ($data[$key] != $visitor[$key]) {
                    array_push($changes, $key);
                }
            }
        }
        
        
        $selectionsToCheck = null;
        if($interest != null || $options != null){
            $selectionsToCheck = array();
        }
        if($interest != null){
           $selectionsToCheck = array_merge($selectionsToCheck,$interest);
        }
        
        if($options != null){
           $selectionsToCheck = array_merge($selectionsToCheck, $options);
        }

        $sql = 'SELECT visitor_selection_on_card.*,title FROM visitor_selection_on_card LEFT JOIN selection_on_card '
                . 'ON visitor_selection_on_card.selection_on_card_id = selection_on_card.selection_on_card_id WHERE visitor_id = ?';
        $visitor_selection_on_card = $this->db->query($sql, array(
                    $visitor_id
                ))->result_array();


        $visitor['log_id'] = $log_id;
        
        foreach ($visitor_selection_on_card as $selection) {

            if ($selectionsToCheck != null) {
                if (!in_array($selection['selection_on_card_id'], $selectionsToCheck)) {
                    array_push($changes, "Removed " . $selection['title'] . '');
                }
            }
            unset($selection['title']);


            $selection['log_id'] = $log_id;
            $this->db->insert('visitor_selection_on_card_history', $selection);
        }


        if ($selectionsToCheck != null) {
            foreach ($selectionsToCheck as $new_selection) {
                $exists = false;
                foreach ($visitor_selection_on_card as $selection) {
                    if ($new_selection == $selection['selection_on_card_id']) {
                        $exists = true;
                        break;
                    }
                }

                if (!$exists) {
                    $selectionData = $this->db->get_where("selection_on_card", array(
                                "selection_on_card_id" => $new_selection
                            ))->result_array()[0];
                    array_push($changes, "Added " . $selectionData['title'] . "");
                }
            }
            
            echo "SELECTIONS TO CHECK : " . json_encode($selectionsToCheck);
        }

        $changes = json_encode($changes);

        $visitor['changes'] = $changes;
        $this->db->insert("visitor_history", $visitor);

        $this->db->where("visitor_id", $visitor_id);
        $this->db->update("visitor", $data);

        /*
          $this->db->where("visitor_id",$vistor_id);
          $this->db->delete("visitor_selection_on_card");
         * 
         */
    }

    public function get($visitor_id) {
        $this->db->select("*");
        $this->db->from("visitor");
        $this->db->join("age_group", "visitor.age_group = age_group.id", "left");
        $this->db->where("visitor_id", $visitor_id);
        $visitor = $this->db->get()->result_array();
        //die(json_encode($visitor));
        if (!count($visitor)) {
            return $visitor;
        }

        $visitor = $visitor[0];
        $this->db->select("*");
        $this->db->from("visitor_selection_on_card");
        $this->db->join("selection_on_card", 'visitor_selection_on_card.selection_on_card_id = selection_on_card.selection_on_card_id', 'left');
        $this->db->where("visitor_id", $visitor_id);

        $visitor['selection_on_card'] = $this->db->get()->result_array();


        $this->db->select("*");
        $this->db->from("visitor_feedback");
        //$this->db->join("feedback_status", 'visitor_feedback.status = feedback_status.id', 'left');
        $this->db->order_by("visitor_feedback_id", "desc");
        $visitor['feedback'] = $this->db->get()->result_array();

        return $visitor;
    }

    public function get_by_user($user_id) {
        $sql = "SELECT * FROM ( SELECT visitor.*,"
                . "(SELECT created_on from visitor_feedback "
                . "where visitor_id = visitor.visitor_id "
                . "order by visitor_feedback_id desc limit 1) as last_update_feedback "
                . "FROM visitor) t WHERE assigned_to = $user_id AND deleted = 0 order by (CASE WHEN last_update_feedback IS NULL THEN 1 ELSE 0 END) DESC, 
         last_update_feedback DESC ";

        return $this->db->query($sql)->result_array();
    }

    public function insert($data) {
        $this->db->insert('visitor', $data);
        $visitor_id = $this->db->insert_id();

        return $visitor_id;
    }

    public function clear_selection($visitor) {
        $this->db->where("visitor_id", $visitor);
        $this->db->delete("visitor_selection_on_card");
    }

    public function insert_selection_on_card($data) {

        $this->db->insert('visitor_selection_on_card', $data);
    }

    public function update($data, $where) {
        $this->db->where($where);
        $this->db->update('visitor', $data);
    }

    public function add_feedback($feedback) {
        $this->db->insert('visitor_feedback', $feedback);

        return $this->db->insert_id();
    }

    public function get_visitor_detail($id) {
        $this->db->select('visitor.*, user.username as added_by,(SELECT `group` from age_group where id = visitor.age_group) as age_group ');
        $this->db->from('visitor');
        $this->db->join('user', 'visitor.created_by = user.user_id', 'left');
        $this->db->where('visitor_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_visitor_assigned_to($id) {
        $this->db->select('user.username as assigned_to');
        $this->db->from('visitor');
        $this->db->join('user', 'visitor.assigned_to = user.user_id', 'left');
        $this->db->where('visitor_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_visitor_feedback_details($id) {
        $this->db->select('visitor_feedback_id,visitor.name, visitor_feedback.feedback, visitor_feedback.created_on,(SELECT username from user where user_id = visitor_feedback.created_by) as user');
        $this->db->from('visitor');
        $this->db->join('visitor_feedback', 'visitor.visitor_id = visitor_feedback.visitor_id', 'left');
        $this->db->where('visitor_feedback.deleted = 0');
        $this->db->where('visitor.visitor_id', $id);
        $this->db->order_by('visitor_feedback.visitor_feedback_id DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_visitor_selection_on_card_details($id) {
        $this->db->select('visitor.name, selection_on_card.selection_on_card_id, selection_on_card.title, selection_on_card.type');
        $this->db->from('visitor');
        $this->db->join('visitor_selection_on_card', 'visitor.visitor_id = visitor_selection_on_card.visitor_id', 'left');
        $this->db->join('selection_on_card', 'visitor_selection_on_card.selection_on_card_id = selection_on_card.selection_on_card_id', 'left');
        $this->db->where('visitor_selection_on_card.deleted = 0');
        $this->db->where('visitor.visitor_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_feedback($id) {
        $this->db->select('*,(SELECT username FROM user WHERE user.user_id = visitor_feedback.created_by) as user');
        $this->db->from("visitor_feedback");
        $this->db->where("visitor_feedback_id", $id);


        return $this->db->get()->result_array()[0];
    }

    function get_log($visitor_id) {

        $sql = "SELECT *,"
                . "(SELECT username from user WHERE user_id = log.user_id) as username FROM log WHERE log_action_id IN "
                . "(SELECT id FROM log_action WHERE module = 'visitor') AND "
                . "(parameter = ? OR parameter LIKE ?) ORDER BY created_date DESC";

        $logs = $this->db->query($sql, array(
                    $visitor_id,
                    "%" . ',"visitor":"' . $visitor_id . '"}'
                ))->result_array();

        return $logs;
    }

    function get_history($log_id) {
        $this->db->select('visitor_history.*, user.username as added_by,(SELECT `group` from age_group where id = visitor_history.age_group) as age_group ');
        $this->db->from('visitor_history');
        $this->db->join('user', 'visitor_history.created_by = user.user_id', 'left');
        $this->db->where('log_id', $log_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_visitor_selection_on_card_history($log_id) {
        $result = $this->db->get_where("visitor_selection_on_card_history", array(
                    "log_id" => $log_id
                ))->result_array();

        return $result;
    }

    function add_follow_up($data) {
        $this->db->insert("visitor_follow_up", $data);
        $log_id = $this->db->insert_id();
        $visitor = $this->db->get_where("visitor", array(
                    "visitor_id" => $data['visitor_id']
                ))->result_array();
        $this->Logger->visitor("add_follow_up", $visitor[0]['name'], $log_id);

        return $log_id;
    }

    function get_follow_up_by_id($follow_up_id) {
        $sql = "SELECT *,"
                . "(Select username from user WHERE appoint_to = user_id) as appoint_to_name,"
                . "(Select name from visitor WHERE t.visitor_id = visitor_id) as visitor_name,"
                . "(Select username from user where t.user_id = user_id) as created_by_name "
                . " FROM visitor_follow_up t WHERE id = ?";
        $result = $this->db->query($sql, array(
                    $follow_up_id
                ))->result_array();

        if (!count($result)) {
            return false;
        }
        for ($i = 0; $i < count($result); $i++) {
            $this->db->select("*, (SELECT username FROM user WHERE user_id = visitor_follow_up_notes.user_id) as user_name ");
            $this->db->from("visitor_follow_up_notes");
            $this->db->where("follow_up_id", $result[$i]['id']);
            $this->db->order_by("id", "ASC");
            $feedback = $this->db->get()->result_array();

            $result[$i]['follow_up_notes'] = $feedback;
        }
        return $result[0];
    }

    function get_follow_up_history($log_id) {
        $sql = "SELECT *,"
                . "(Select username from user WHERE appoint_to = user_id) as appoint_to_name,"
                . "(Select name from visitor WHERE t.visitor_id = visitor_id) as visitor_name,"
                . "(Select username from user where t.user_id = user_id) as created_by_name "
                . " FROM visitor_follow_up_history t WHERE log_id = ?";
        $result = $this->db->query($sql, array(
                    $log_id
                ))->result_array();

        if (!count($result)) {
            return false;
        }
        for ($i = 0; $i < count($result); $i++) {
            $this->db->select("*, (SELECT username FROM user WHERE user_id = visitor_follow_up_notes.user_id) as user_name ");
            $this->db->from("visitor_follow_up_notes");
            $this->db->where("follow_up_id", $result[$i]['id']);
            $this->db->order_by("id", "ASC");
            $feedback = $this->db->get()->result_array();

            $result[$i]['follow_up_notes'] = $feedback;
        }
        return $result[0];
    }

    function get_follow_up_by_visitor($visitor_id) {
        $sql = "SELECT *,"
                . "(Select username from user WHERE appoint_to = user_id) as appoint_to_name"
                . " FROM visitor_follow_up WHERE visitor_id = ?";
        $result = $this->db->query($sql, array(
                    $visitor_id
                ))->result_array();

        for ($i = 0; $i < count($result); $i++) {
            $this->db->order_by("id", "desc");
            $feedback = $this->db->get_where("visitor_follow_up_notes", array(
                        "follow_up_id" => $result[$i]['id']
                    ))->result_array();

            $result[$i]['follow_up_notes'] = $feedback;
        }
        return $result;
    }

    public function update_where_table($where, $data, $table_name) {
        $this->db->where($where);
        $this->db->update($table_name, $data);
    }

    function get_pending() {
        $sql = "SELECT visitor.*,(SELECT count(id) FROM visitor_follow_up_notes WHERE follow_up_id = visitor_follow_up.id) as note_count FROM visitor_follow_up LEFT JOIN visitor on "
                . "visitor_follow_up.visitor_id = visitor.visitor_id "
                . "WHERE appoint_to = ? AND visitor.deleted = 0 GROUP by visitor_follow_up.visitor_id "
                . "HAVING note_count = 0";
        $pending = $this->db->query($sql, array($this->session->userdata("user_id")))->result_array();

        return $pending;
    }
    
    function get_all_my_visitor(){
        $sql = "SELECT visitor.*,(SELECT count(id) FROM visitor_follow_up_notes WHERE follow_up_id = visitor_follow_up.id) as note_count FROM visitor_follow_up LEFT JOIN visitor on "
                . "visitor_follow_up.visitor_id = visitor.visitor_id "
                . "WHERE appoint_to = ? AND visitor.deleted = 0 GROUP by visitor_follow_up.visitor_id ";
        
        $pending = $this->db->query($sql, array($this->session->userdata("user_id")))->result_array();

        return $pending;
    }

}
