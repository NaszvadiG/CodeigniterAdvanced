<?php

class User extends CI_Model {

    public function _is_connect() {
        if (is_numeric($this->session->userdata("users_id")) and $this->session->userdata("users_id") > 0) {
            return $this->session->users_id;
        } else {
            return false;
        }
    }

    public function connect($users_id) {
        $newdata = array('users_id' => $users_id);
        if ($this->session->set_userdata($newdata)) {
            return true;
        } else {
            return false;
        }
    }

    public function infoWithEmail($users_email) {
        $this->db->where("users.users_email", $users_email);
        $result = $this->db->get("users");
        if ($result->num_rows() == 1) {
            $users = $result->result();
            return $users;
        } else {
            return false;
        }
    }

    public function info() {
        $users_id = $this->_is_connect();
        if ($users_id) {
            $this->db->where("users_id", $users_id);
            $result = $this->db->get("users");
            $data = $result->result();
            if (isset($data)) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function add($users_data) {
        $this->db->insert('users', $users_data);
        return $this->db->insert_id();
    }

    public function updatePassword($users_id, $users_new_password) {
        $data = array(
            'users_password' => $users_new_password,
        );
        $this->db->where('users_id', $users_id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    public function updateToken($users_id, $users_token) {
        $data = array(
            'users_token' => $users_token,
        );
        $this->db->where('users_id', $users_id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    public function detail($users_id) {
        $this->db->where("users_id", $users_id);
        $result = $this->db->get("users");
        if ($result->num_rows() == 1) {
            $data = $result->result();
            return $data;
        } else {
            return false;
        }
    }

}

?>
