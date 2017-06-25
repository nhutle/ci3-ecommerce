<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Login extends MY_Controller {
    public function index() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');

            if ($this->form_validation->run()) {
                $this->session->set_userdata('login', true);
                redirect(admin_url('home'));
            }
        }

        $this->load->view('admin/login/index');
    }

    public function check_login() {
        $this->load->model('Admin_model');

        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));

        $where = array('username' => $username, 'password' => $password);

        if ($this->Admin_model->check_exists($where)) {
            return true;
        }

        $this->form_validation->set_message(__FUNCTION__, 'Login failed');
        return false;
    }
}
