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
        $sql = "SELECT * FROM users WHERE users.users_email=? LIMIT 1";
        $result = $this->db->query($sql, array($users_email));
        if ($result->num_rows() == 1) {
            $users = $result->result();
            return $users[0];
        } else {
            return false;
        }
    }

    public function info() {
        $users_id = $this->_is_connect();
        if ($users_id) {
            $sql = "SELECT * FROM users WHERE users.users_id =?";
            $result = $this->db->query($sql, array($users_id));
            $data = $result->result();
            if (isset($data[0])) {
                return $data[0];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function add($users_nickname, $users_email, $users_password, $users_token, $users_date_insert) {
        $data = array('users_nickname' => $users_nickname, 'users_email' => $users_email, 'users_password' => $users_password, 'users_token' => $users_token, 'users_date_insert' => $users_date_insert);
        $this->db->insert('users', $data);
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
        $sql = "SELECT * FROM users WHERE users.users_id=?";
        $result = $this->db->query($sql, array(intval($users_id)));
        if ($result->num_rows() == 1) {
            $data = $result->result();
            return $data[0];
        } else {
            return false;
        }
    }

}

?>
