<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	
	public function index() {
		$this->load->view('pages/back_office/index');
	}

	public function loginSuperUser() {
		$data = array();

		$mail = $this->input->post('mail');
		$mdp = $this->input->post('mdp');

		$data['superUser'] = $this->user->getSuperUser($mail, $mdp);

		if($data['superUser'] == null)
		{
				$statue = array('response' => 'error',
												'message' => 'Aucun utilisateur correspondant');
		
		}
		else{
				$this->session->set_userdata('id',$data['superUser']['idsuperuser']);
				$statue = array('response' => 'success',
												'message' => $data['superUser']);
		}

		echo json_encode($statue);
	}

	public function deconnection() {
		redirect(base_url("C_Index/login_user"));
	}
}
