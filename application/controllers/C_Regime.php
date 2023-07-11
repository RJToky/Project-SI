<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Regime extends CI_Controller {

    public function regimeParObjectif() {

        $idObjectif = intval($this->input->post('idObjectif'));
        $kilo = intval($this->input->post('kilo'));

        $data["regime"] = $this->reg->dureeRegime($idObjectif, $kilo);

        if($data["regime"] == null) {
            $statue = array('response' => 'error',
                            'message' => 'IdObjectif invalide');
        } else {
            $statue = array('response' => 'success',
                            'message' => $data["regime"]);
        }

        echo json_encode($statue);

    }

    public function detailRegime() {

        $idRegime = intval($this->input->post('idRegime'));

        $data["detail"] = $this->reg->listePlatSportByRegime($idRegime);

        if($data["detail"] == null) {
            $statue = array('response' => 'error',
                            'message' => 'IdRegime invalide');
        } else {
            $statue = array('response' => 'success',
                            'message' => $data["detail"]);
        }

        echo json_encode($statue);
    }

    public function detail_regime($idregime) {
		$data["detail"] = $this->reg->listePlatSportByRegime($idregime);
		
		$this->load->view("pages/front_office/uploadfile", $data);
	}

       
}
