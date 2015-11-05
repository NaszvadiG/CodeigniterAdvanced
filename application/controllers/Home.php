<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $data['title'] = "Welcome to CodeigniterAdvanced";
        $this->Core->load("page/home", $data);
    }

}
