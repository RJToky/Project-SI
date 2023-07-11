<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {
	
	public function index() {
		$idUser = $this->session->userdata("id");
		$idobjectif = $this->obj->getIdObjectifByUser($idUser);
		$poidsvisee = $this->user->getRegimePersonne($idUser)["poidsvisee"];
		$data["suggestions"] = $this->reg->dureeRegime($idobjectif, $poidsvisee);

		$this->load->view('pages/front_office/suggestions', $data);
	}

	public function detail_regime($idregime) {
		$data["detail"] = $this->reg->listePlatSportByRegime($idregime);

		$idUser = $this->session->userdata("id");
		$idobjectif = $this->obj->getIdObjectifByUser($idUser);
		$poidsvisee = $this->user->getRegimePersonne($idUser)["poidsvisee"];
		$data["suggestion"] = $this->reg->dureeByIdRegime($idobjectif, $poidsvisee, $idregime);
		
		$this->load->view("pages/front_office/detail_regime", $data);
	}

	public function wallet() {
		$idUser = $this->session->userdata("id");
		$data["solde"] = $this->user->getSolde($idUser);

		$kilo = abs(intval($this->user->getPoids($idUser)) - intval($this->user->getPoidsVisee($idUser)));

		$data["transactions"] = $this->user->dernierTransaction($idUser, $kilo);

		$this->load->view('pages/front_office/wallet', $data);
	}

	public function deconnection() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('prenom');

		redirect(base_url("C_Index/index"));
	}
}
