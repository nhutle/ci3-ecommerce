<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

Class Admin extends MY_Controller {
    function __construct() {
    	parent::__construct();
        $this->load->model('Admin_model');
    }

    public function create() {
        $data             = array();
        $data['username'] = 'admin1';
        $data['password'] = 'admin1';
        $dataa['name']    = 'Hocphp';

        if ($this->Admin_model->create($data)) {
            echo 'success';
        } else {
            echo 'failure';
        }
    }

    public function update() {
        $id               = '8';
        $data             = array();
        $data['username'] = 'admin2';
        $data['password'] = 'admin2';
        $data['name']    = 'Hocphp 2';

        if ($this->Admin_model->update($id, $data)) {
        	echo 'success';
        } else {
        	echo 'failure';
        }
    }
}
