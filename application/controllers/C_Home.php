<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {
	
	public function index() {
		$this->load->view('pages/front_office/suggestions');
	}

	public function detail_regime($idregime) {
		$this->load->view("pages/front_office/detail_regime");
	}
}
