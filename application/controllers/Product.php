<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

Class Product extends MY_Controler {
	public function __construct () {
		parent::__construct();
		$this->load->model('Product_model');
	}

	public function index() {
		$input = array('limit' => array(5, 0));
		$products = $this->Product_model->get_list($input);
		print_r($products);
	}

	public function add() {
		$data = array(
			'name' => 'Nokia 520',
			'price' => '3000000'
		);

		if ($this->Product_model->create($data)) {
			// success
		}
	}
}
