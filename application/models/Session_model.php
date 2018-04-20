<?php

class Session_model extends CI_Model {

    public function session_update() {
        // need to be shifted
        $role_perm = $this->db->get_where("role", array("role_id" => $this->session->userdata("role_id")))->result_array();
        if (count($role_perm)) {

            foreach ($role_perm[0] as $key => $val) {

                $this->session->set_userdata($key, $val);
            }
        }
    }

}

?>