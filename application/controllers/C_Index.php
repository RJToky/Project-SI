<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Index extends CI_Controller {
	
	public function index() {
		$this->load->view("pages/front_office/sign_in");
	}

	public function login_user() {
		$this->load->view('pages/front_office/sign_in');
	}

	public function login_admin() {
		$this->load->view("pages/back_office/sign_in");
	}
}
