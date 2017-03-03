<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller {
    public function index() {
        $data         = array();
        $data['view'] = 'site/home/index';
        $this->load->view('site/layout', $data);
    }

    public function view() {
        $data          = array();
        $data['title'] = 'Hello';
        $this->load->view('site/home/view', $data);
    }
}
