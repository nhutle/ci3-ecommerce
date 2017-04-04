<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Login extends MY_Controller {
	public function index() {
		$this->load->view('admin/login/index');
	}
}
