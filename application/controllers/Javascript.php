<?php

class Javascript extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['title'] = "Welcome to CodeigniterAdvanced Javascript";
        $data['csss_add'] = array(
            site_url("assets/lib/bootstrap/css/bootstrap.min.css"),
            site_url("assets/lib/bootstrap/css/bootstrap-theme.min.css")
        );
        $data['jss_add'] = array(
            site_url("assets/lib/jquery/jquery-1.11.3.min.js"),
            site_url("assets/lib/bootstrap/js/bootstrap.min.js"),
        );
        $this->Core->load("page/javascript", $data);
    }

}

?> 