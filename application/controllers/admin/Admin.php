<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

Class Admin extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index() {
        $input = array();
        $admin = $this->Admin_model->get_list($input);
        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }
}
