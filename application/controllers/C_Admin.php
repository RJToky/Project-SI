<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	
	public function index() {
		$this->load->view('pages/back_office/index');
	}

	public function deconnection() {
		redirect(base_url("C_Index/login_user"));
	}
}
