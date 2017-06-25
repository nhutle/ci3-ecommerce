<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class MY_Controller extends CI_Controller {
    public $data = array();

    function __construct() {
        parent::__construct();

        $controller = $this->uri->segment(1);

        switch ($controller) {
        case 'admin':
            $this->load->helper('admin');
            $this->_check_login();
            break;

        default:
            break;
        }
    }

    private function _check_login() {
        $page = $this->uri->segment(2);

        $login = $this->session->userdata('login');

        // print_r($page);die();

        if  (!$login && $page != 'login') {
            redirect(admin_url('login'));
        }

        if ($login && $page == 'login') {
            redirect(admin_url('home'));
        }
    }
}
