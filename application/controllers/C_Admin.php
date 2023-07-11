<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	
	public function index() {
		$data = array(
			"page" => "Accueil",
			"chiffre" => $this->user->chiffreAffaire(),
			"nbruser" => $this->user->countUser(),
			"aug" => $this->user->countUserByObjectif(1),
			"red" => $this->user->countUserByObjectif(2),
		);

		$this->load->view('pages/back_office/accueil', $data);
	}

	public function graphe() {
		$data["data1"] = $this->user->statistiqueParMontant();
		$data["data2"] = $this->user->statistiqueParPoids();

		echo json_encode($data);
	}

	public function regime() {
		$data["page"] = "Régime";
		$this->load->view('pages/back_office/regime', $data);
	}

	public function modif_regime($idregime) {
		$data["page"] = "Régime";
		$this->load->view('pages/back_office/modif_regime', $data);
	}

	public function ajout_regime() {
		$data["page"] = "Régime";
		$this->load->view('pages/back_office/ajout_regime', $data);
	}

	public function activite_sportive() {
		$data["page"] = "Activité sportive";
		$this->load->view('pages/back_office/activite_sportive', $data);
	}

	public function code() {
		$data["page"] = "Code porte monnaie";
		$this->load->view('pages/back_office/code', $data);
		$data = array();

		$nbUser = $this->user->countUser();
		$nbUserBota = $this->user->countUserByObjectif(1);
		$nbUserMahia = $this->user->countUserByObjectif(2);

		$data["nbuser"] = $nbUser;
		$data["nbuserbota"] = $nbUserBota;
		$data["nbusermahia"] = $nbUserMahia;

		// var_dump($data);
					
		//$this->load->view('pages/back_office/index', $data);
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
