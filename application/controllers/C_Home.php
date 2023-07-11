<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {
	
	public function index() {
		$this->load->view('pages/front_office/suggestions');
	}

	public function autres_regimes() {
		$this->load->view("pages/front_office/autres_regimes");
	}

	public function detail_regime($idregime) {
		$this->load->view("pages/front_office/detail_regime");
	}

	public function wallet() {
		$this->load->view('pages/front_office/wallet');
	}
}
