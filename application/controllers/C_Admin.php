<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	
	public function index() {
		$data["page"] = "Accueil";
		$this->load->view('pages/back_office/accueil', $data);
	}

	public function regime() {
		$data["page"] = "Régime";
		$this->load->view('pages/back_office/regime', $data);
	}

	public function activite_sportive() {
		$data["page"] = "Activité sportive";
		$this->load->view('pages/back_office/activite_sportive', $data);
	}

	public function code() {
		$data["page"] = "Code porte monnaie";
		$this->load->view('pages/back_office/code', $data);
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
