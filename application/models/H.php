<?php

class H extends CI_Model {

    public function __construct() {
        $this->load->library('encrypt');
    }

    public function encode($action, $email) {
        return $this->encrypt->encode($action . ";" . $email, $this->encrypt->get_key());
    }

    public function decode($token) {
        $encypt = $this->encrypt->decode($token, $this->encrypt->get_key());
        $e = explode(";", $encypt);
        return $e;
    }

}

?>