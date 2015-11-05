<?php

class Core extends CI_Model {

    public function load($view, $data, $is_ajax = false) {
        if ($this->config->item("maintenance") == TRUE and $view != "maintenance/index") {
            $this->maintenance();
            exit();
        }
        $lang = "fr";
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        }
        switch ($lang) {
            default:

                break;
            case("en"):
                $this->lang->load('system', 'english');
                break;
            case("fr"):
                $this->lang->load('system', 'french');
                break;
        }
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', 1) . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $data['base_url'] = $this->config->base_url();
        $data['user'] = $this->User->info();
        if ($data['user']) {
            $data['users_favourites'] = $this->User->favourites_get($data['user']->users_id, 'users_favourites.services_id');
        }
        if (!isset($data['title'])) {
            $data['title'] = "NO TITLE";
        }
        $data['base_assets_url'] = $data['base_url'] . "assets/";
        $data['base_upload_url'] = $data['base_url'] . "uploads/";
        $data['base_tag_url'] = $data['base_url'] . "tags/index/";
        $data['debug'] = $this->config->item("debug");
        if (!$is_ajax) {
            $data['csss_default'] = array(
            );
            $data['jss_default'] = array(
            );
            $data['jss_top'] = array(
            );
            if (isset($data['jss_top_add'])) {
                $data['jss_top'] = array_merge($data['jss_top_add'], $data['jss_top']);
            }
            if (isset($data['jss_add'])) {
                $data['jss'] = array_merge($data['jss_default'], $data['jss_add']);
            } else {
                $data['jss'] = $data['jss_default'];
            }
            if (isset($data['csss_add'])) {
                $data['csss'] = array_merge($data['csss_default'], $data['csss_add']);
            } else {
                $data['csss'] = $data['csss_default'];
            }
            if (!isset($data['onLoad'])) {
                $data['onLoad'] = "";
            }
            $this->load->view('template/header', $data);
        }

        $this->load->view($view, $data);
        if (!$is_ajax) {
            $this->load->view('template/footer', $data);
        }
    }

    public function JSON($return) {
        header('Content-Type: application/json');
        echo json_encode($return);
    }

    public function debug($str) {
        $fopen = fopen("debug/" . date("Y_m_d") . ".txt", "a");
        fwrite("DEBUG : \n");
        if (is_array($str)) {
            foreach ($str as $key => $value) {
                fwrite($str);
            }
        } else {
            fwrite($str);
        }
        fclose($fopen);
    }

    private function out() {
        $data['test'] = "";
        $this->load("users/connexion", $data);
    }

    private function maintenance() {
        header("Location: " . $this->config->base_url() . "maintenance/");
    }

}

?>