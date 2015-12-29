<?php

class Mail extends CI_Model {

    public function subscribe($users_email, $token) {
    }
    public function forgetPassword($user, $token) {
    }

    public function __send($users_email, $subject, $content) {
        $this->load->library('email');
        $this->email->from('no-reply@bootbuilder.org', 'BootBuilder');
        $this->email->to($users_email);
        $this->email->subject($subject);
        $this->email->message($this->_html($content));
        $this->email->mailtype = "html";
        return $this->email->send();
    }

    public function _html($message) {
        $html = '<span>'.$message.'</span>';

        return $html;
    }

}

?>