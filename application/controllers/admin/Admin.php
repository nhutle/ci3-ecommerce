<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

Class Admin extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index() {
        $input = array();

        $list               = $this->Admin_model->get_list($input);
        $this->data['list'] = $list;

        $total               = $this->Admin_model->get_total();
        $this->data['total'] = $total;

        $message               = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp']    = 'admin/admin/index';

        $this->load->view('admin/main', $this->data);
    }

    public function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Confirm Password', 'matches[password]');

            if ($this->form_validation->run()) {
                $name     = $this->input->post('name');
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));

                $data = array(
                    'name'     => $name,
                    'username' => $username,
                    'password' => $password,
                );

                if ($this->Admin_model->create($data)) {
                    $this->session->set_flashdata('message', 'success');
                } else {
                    $this->session->set_flashdata('message', 'failure');
                }

                redirect(admin_url('admin'));
            }
        }

        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }

    public function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $info = $this->Admin_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Not found');
            redirect(admin_url('admin'));
        }

        $this->data['info'] = $info;

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]');

            $password = $this->input->post('password');

            if ($password) {
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Confirm Password', 'matches[password]');
            }

            if ($this->form_validation->run()) {
                $name     = $this->input->post('name');
                $username = $this->input->post('username');

                $data = array(
                    'name'     => $name,
                    'username' => $username,
                );

                if ($password) {
                    $data['password'] = sha1($password);
                }

                if ($this->Admin_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Update successfully');
                } else {
                    $this->session->set_flashdata('message', 'Update failed');
                }

                redirect(admin_url('admin'));
            }
        }

        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);
    }

    public function delete($id) {
        $info = $this->Admin_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Not found');
            redirect(admin_url('admin'));
        }

        $this->Admin_model->delete($id);
        $this->session->set_flashdata('message', 'Delete successfully');

        redirect(admin_url('admin'));
    }

    public function check_username($username) {
        $where = array('username' => $username);

        if ($this->Admin_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Username is existing');

            return false;
        }

        return true;
    }

    public function logout() {
        if ($this->session->userdata('login')) {
            $this->session->unset_userdata('login');
        }

        redirect(admin_url('login'));
    }
}
