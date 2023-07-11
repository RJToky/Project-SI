<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {
	
	public function index() {
		$idUser = $this->session->userdata("id");
		$idobjectif = $this->obj->getIdObjectifByUser($idUser);
		$kiloUser = $this->user->getDetailUser($idUser)["poidsuser"];
		$data["suggestions"] = $this->reg->dureeRegime($idobjectif, $kiloUser);

		$this->load->view('pages/front_office/suggestions', $data);
	}

	public function detail_regime($idregime) {
		$data["detail"] = $this->reg->listePlatSportByRegime($idregime);

		$idUser = $this->session->userdata("id");
		$idobjectif = $this->obj->getIdObjectifByUser($idUser);
		$kiloUser = $this->user->getDetailUser($idUser)["poidsuser"];
		$data["suggestion"] = $this->reg->dureeByIdRegime($idobjectif, $kiloUser, $idregime);
		
		$this->load->view("pages/front_office/detail_regime", $data);
	}

	public function wallet() {
		$idUser = $this->session->userdata("id");
		$data["solde"] = $this->user->getSolde($idUser);
		
		$this->load->view('pages/front_office/wallet', $data);
	}
}
