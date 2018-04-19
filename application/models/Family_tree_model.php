<?php

class Family_tree_model extends CI_Model {

    public function get_family_tree($user_id) {

        $this->db->select('referrer_id, user_id');
        $this->db->from('agent');
        $this->db->where('user_id', $user_id);

        $query = $this->db->get();

        $result = $query->result_array();

        $referrer_id = $result[0]['referrer_id'];

        $tree_parent_id = $result[0]['user_id'];

        $this->db->select('agent.user_id, user.full_name, user.thumbnail');
        $this->db->from('agent');
        $this->db->join('user', 'agent.user_id = user.user_id', "left");
        $this->db->where('agent.referrer_id', $tree_parent_id);

        $query = $this->db->get();

        $result = $query->result_array();

        $member = $result;

        $i = 0;
        foreach ($member as $row) {
            $child = $this->get_recursive_child($row['user_id']);
            $member[$i]['child'] = $child;
            $i++;
        }

        $this->db->select('agent.user_id, agent.referrer_id, user.full_name, user.thumbnail');
        $this->db->from('agent');
        $this->db->join('user', 'agent.user_id = user.user_id', "left");
        $this->db->where('agent.user_id', $tree_parent_id);

        $query = $this->db->get();

        $result = $query->result_array();

        $tree_parent = $result[0];

        if ($tree_parent['referrer_id'] != 0) {
            $tree_parent['parent'] = $this->get_recursive_parent($tree_parent['referrer_id'], $tree_parent);
        }

        $i = 0;
        $tree = "<ul id=\"org\"\">";
        if (!empty($tree_parent['parent'])) {
            if (!empty($tree_parent['parent']['parent'])) {
                $tree = $tree . "\n" . $this->get_recursive_parent_list_start($tree_parent['parent']);
            } else {
                $tree = $tree . "\n" . "<li><a href=\"" . base_url() . "user/user_details/" . $tree_parent['parent']['user_id'] . "\"><img class=\"cropped round-img\" src=\"" . base_url() . $tree_parent['parent']['thumbnail'] . "\"data-toggle=\"tooltip\" title=\"" . $tree_parent['parent']['full_name'] . "\"></a>";
                $tree = $tree . "\n" . "<ul>";
            }
        }
        $tree = $tree . "\n" . "<li><a href=\"" . base_url() . "user/user_details/" . $tree_parent['user_id'] . "\"><img class=\"cropped round-img\" src=\"" . base_url() . $tree_parent['thumbnail'] . "\"data-toggle=\"tooltip\" title=\"" . $tree_parent['full_name'] . "\"></a>";
        $tree = $tree . "\n" . "<ul>";
        foreach ($member as $row) {
            $tree = $tree . "\n" . "<li><a href=\"" . base_url() . "user/user_details/" . $row['user_id'] . "\"><img class=\"cropped round-img\" src=\"" . base_url() . $row['thumbnail'] . "\"data-toggle=\"tooltip\" title=\"" . $row['full_name'] . "\"></a>";
            if (!empty($row['child'])) {
                $tree = $tree . "\n" . $this->get_recursive_child_list($row['child']);
            }
            $tree = $tree . "\n" . "</li>";
        }
        $tree = $tree . "\n" . "</ul>";
        $tree = $tree . "\n" . "</li>";
        if (!empty($tree_parent['parent'])) {
            if (!empty($tree_parent['parent']['parent'])) {
                $tree = $tree . "\n" . $this->get_recursive_parent_list_end($tree_parent['parent']);
            } else {
                $tree = $tree . "\n" . "</li>";
                $tree = $tree . "\n" . "</ul>";
            }
        }
        $tree = $tree . "\n" . "</ul>";

        return($tree);
    }

    public function get_recursive_parent($referrer_id) {
        $this->db->select('agent.user_id, agent.referrer_id, user.full_name, user.thumbnail');
        $this->db->from('agent');
        $this->db->join('user', 'agent.user_id = user.user_id', "left");
        $this->db->where('agent.user_id', $referrer_id);

        $query = $this->db->get();

        $result = $query->result_array();

        $parent = $result[0];

        if ($parent['referrer_id'] != 0) {
            $parent['parent'] = $this->get_recursive_parent($parent['referrer_id']);
            $parent['parent']['child'] = $parent;
        }

        return $parent;
    }

    public function get_recursive_child($referrer_id) {

        $this->db->select('agent.user_id, user.full_name, user.thumbnail');
        $this->db->from('agent');
        $this->db->join('user', 'agent.user_id = user.user_id', "left");
        $this->db->where('agent.referrer_id', $referrer_id);

        $query = $this->db->get();

        $result = $query->result_array();

        $child = $result;

        $i = 0;
        foreach ($child as $row) {
            $recursive_child = $this->get_recursive_child($row['user_id']);
            $child[$i]['child'] = $recursive_child;
            $i++;
        }

        return($child);
    }

    public function get_recursive_parent_list_start($parent) {
        $tree = "";

        if (!empty($parent['parent']['parent'])) {
            $tree = $tree . "\n" . $this->get_recursive_parent_list_start($parent['parent']);
        } else {
            $tree = $tree . "\n" . "<li><a href=\"" . base_url() . "user/user_details/" . $parent['parent']['user_id'] . "\"><img class=\"cropped round-img\" src=\"" . base_url() . $parent['parent']['thumbnail'] . "\"data-toggle=\"tooltip\" title=\"" . $parent['parent']['full_name'] . "\"></a>";
            $tree = $tree . "\n" . "<ul>";
            if (!empty($parent['parent']['child'])) {
                $tree = $tree . "\n" . "<li><a href=\"" . base_url() . "user/user_details/" . $parent['parent']['child']['user_id'] . "\"><img class=\"cropped round-img\" src=\"" . base_url() . $parent['parent']['child']['thumbnail'] . "\"data-toggle=\"tooltip\" title=\"" . $parent['parent']['child']['full_name'] . "\"></a>";
                $tree = $tree . "\n" . "<ul>";
            }
        }

        return $tree;
    }

    public function get_recursive_parent_list_end($parent) {
        $tree = "";

        if (!empty($parent['parent']['parent'])) {
            $tree = $tree . "\n" . $this->get_recursive_parent_list_end($parent['parent']);
        } else {
            $tree = $tree . "\n" . "</li>";
            $tree = $tree . "\n" . "</ul>";
            if (!empty($parent['parent']['child'])) {
                $tree = $tree . "\n" . "</li>";
                $tree = $tree . "\n" . "</ul>";
            }
        }

        return $tree;
    }

    public function get_recursive_child_list($child) {
        $tree = "<ul>";

        foreach ($child as $row) {
            $tree = $tree . "\n" . "<li><a href=\"" . base_url() . "user/user_details/" . $row['user_id'] . "\"><img class=\"cropped round-img\" src=\"" . base_url() . $row['thumbnail'] . "\"data-toggle=\"tooltip\" title=\"" . $row['full_name'] . "\"></a>";
            if (!empty($row['child'])) {
                $tree = $tree . "\n" . $this->get_recursive_child_list($row['child']);
            }
            $tree = $tree . "\n" . "</li>";
        }

        $tree = $tree . "\n" . "</ul>";

        return $tree;
    }

    //=============================

    function get_tree($user_id) {
        $this->load->model("User_model");

        $family_list = array();
        $family_list = $this->get_parent($user_id, $family_list);

        $target = $family_list[0];

        while (count($target[0]->data['referrer_info'])) {
            $target = $target[0]->data['referrer_info'];
        }


        $target[0]->data['referrer_info'] = $this->get_child($target[0]->data['user_id']);

        return $family_list;
    }

    function get_parent($user_id, $family_list) {
        $pointer = $this->User_model->get_where(array(
            "user_id" => $user_id
        ));

        $pointer[0]['referrer_info'] = count($family_list) ? $family_list[0] : [];
        $node = new Node($pointer[0]);

        $family_list[0] = array($node);

        if ($pointer[0]['referrer_id'] == '0') { // check for highest node
            return $family_list;
        }
        
        return $this->get_parent($pointer[0]['referrer_id'], $family_list);
    }

    function get_child($user_id) {

        $children = $this->db->get_where("agent", array(
                    "referrer_id" => $user_id
                ))->result_array();

        for ($i = 0; $i < count($children); $i++) {
            $children[$i] = new Node($this->User_model->get_where(array(
                        "user_id" => $children[$i]['user_id']
                    ))[0]);

            $children[$i]->data['referrer_info'] = $this->get_child($children[$i]->data['user_id']);
        }

        return $children;
    }

    function to_html($tree, $html = "") {

        if ($html == "") {
            $html = $html . "<ul id=\"org\" style=\"display:none\">";
        } else {
            $html = $html . "<ul>";
        }
        foreach ($tree as $node) {
            $html = $html . "<li><a href=\"" . base_url() . "user/user_details/" . $node->data['user_id'] . "\"><img class =\"cropped round-img\" data-toggle=\"tooltip\" title=\"" . $node->data['full_name'] . "\" src=\"" . base_url() . $node->data['thumbnail'] . "\"></a>";
            if (count($node->data['referrer_info'])) {
                $html = $this->to_html($node->data['referrer_info'], $html);
            }
            $html = $html . "</li>";
        }
        $html = $html . "</ul>";
        
        return $html;
    }

}

class Node {

    function __construct($data) {
        $this->data = $data;
    }

}

?>