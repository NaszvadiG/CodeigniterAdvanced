<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        redirect(site_url("Home/components"));
        $data['title'] = "Welcome to CodeigniterAdvanced";
        $this->Core->load("page/home", $data);
    }
    public function components()
    {
        $data['title'] = "Welcome to CodeigniterAdvanced Components";
        $data['csss_add'] = array(
            site_url("assets/lib/bootstrap/css/bootstrap.min.css"),
            site_url("assets/lib/bootstrap/css/bootstrap-theme.min.css")
        );
        $data['jss_add'] = array(
        site_url("assets/lib/jquery/jquery-1.11.3.min.js"),
        site_url("assets/lib/bootstrap/js/bootstrap.min.js"),
        );
        $this->Core->load("page/components", $data);
        
    }

}
