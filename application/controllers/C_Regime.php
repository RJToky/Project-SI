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

    public function test() {
        var_dump($this->reg->getPrixRegime(intval($this->input->post('idObjectif'))));
    }

       
}
