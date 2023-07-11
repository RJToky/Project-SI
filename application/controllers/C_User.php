<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

    public function login() {

        $data = array();

        $mail = $this->input->post('mail');
        $mdp = $this->input->post('mdp');

        $data['user'] = $this->user->getUser($mail, $mdp);

        if($data['user'] == null)
        {
            $statue = array('response' => 'error',
                            'message' => 'Aucun utilisateur correspondant');
        
        }
        else {
            $this->session->set_userdata('id',$data['user']['iduser']);
            $this->session->set_userdata('prenom',$data['user']['prenomuser']);

            if($this->user->has_done_completion($data['user']['iduser'])) {
                $statue = array(
                    'response' => 'success',
                    'message' => $data['user']
                );
            } else {
                $statue = array('response' => 'redirect');
            }
        }

        echo json_encode($statue);
    }
  
    public function inscription() {
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $genre = intval($this->input->post('genre'));
        $dtn = $this->input->post('dtn');
        $mail = $this->input->post('mail');
        $mdp = $this->input->post('mdp');
        $confirm = $this->input->post('confirm');

        
        if( ($genre == 1 || $genre == 2) && ($mdp == $confirm) ) {
            $this->user->insertUser($nom, $prenom, $genre, $dtn, $mail, $mdp);
            $idUser = $this->user->getIdLastUser()["idlastuser"];

            $this->session->set_userdata('id',$idUser);
            $this->session->set_userdata('prenom',$prenom);

            $this->user->initialisePorteMonnaie($idUser);
            $statue = array('response' => 'success',
                            'message' => 'Insertion avec success');
        } else if ($mdp != $confirm) {
            $statue = array('response' => 'error',
                            'message' => 'Veuillez confirmer votre mot de passe');
        } else {
            $statue = array('response' => 'error',
                            'message' => 'Vérifiez vos données');
        }
        
        
        echo json_encode($statue);
    }

    public function detailsInscription() {
        $idUser = $this->session->userdata("id");
        $taille = intval($this->input->post('taille'));
        $poids = intval($this->input->post('poids'));
        $objectif = intval($this->input->post('objectif'));

        if($objectif > $poids) {
            $idobjectif = 1;
        } else if ($objectif < $poids) {
            $idobjectif = 2;
        }

        if($taille <= 0 || $poids <= 0 || $objectif <= 0) {
            $statue = array('response' => 'error',
                            'message' => 'Vérifier vos données');
        } else {
            if($objectif == $poids) {
                $statue = array('response' => 'error',
                                'message' => 'Vérifier vos données');
            } else {
                $this->user->insertDetailUser($idUser, $taille, $poids);
                $this->user->insertRegimePersonne($idUser, $idobjectif, $objectif);
                
                $statue = array('response' => 'success',
                                'message' => 'Insérer avec success');
            }
        }
           
        echo json_encode($statue);

    }

    public function dernierTransaction() {
        $idUser = $this->session->userdata('id');
        $idObjectif = intval($this->input->post('idObjectif'));
        $kilo = intval($this->input->post('kilo'));

        $data["transaction"] = $this->user->dernierTransaction(1, $idObjectif, $kilo);

        if(($idObjectif == 0 || $kilo == 0) || (($idObjectif == 0 && $kilo == 0))) {
            $statue = array('response' => 'error',
                            'message' => 'Vérifier vos données');
        } else {
            $statue = array('response' => 'success',
                            'message' => $data["transaction"]);
        }

        echo json_encode($statue);
    }

    public function insertAchat($idregime) {
        $idUser = $this->session->userdata("id");
        
        $idobjectif = $this->obj->getIdObjectifByUser($idUser);
		$kiloUser = $this->user->getDetailUser($idUser)["poidsuser"];
        
        $solde = $this->user->getSolde($idUser);
		$prix = $this->reg->dureeByIdRegime($idobjectif, $kiloUser, $idregime)["prix"];

        if($solde >= $prix) {
            $this->user->updatePorteMonnaie($idUser, $solde - $prix);
            $this->user->achatUser($idUser, $solde, $idregime);
            $status = array("response" => "success", "message" => "Achat réussi");

        } else {
            $status = array("response" => "error", "message" => "Votre solde est " . $solde . " Ar, veuillez faire un depôt");
        }
        echo json_encode($status);
    }


    public function endSession(){
        $this->session->unset_userdata('id');        
    }

    public function register() {
		$this->load->view("pages/front_office/sign_up");
	}

    public function completion() {
        $this->load->view("pages/front_office/completion");
    }
    
    public function objectif() {
        $this->load->view("pages/front_office/objectif");
    }

    public function insertCode() {
        $idUser = $this->session->userdata("id");
        $numerocode = $this->input->post("code");
        $code = $this->code->getCode($numerocode);

        if($code["statu"] == 0 || $code["statu"] == 1) {
            $status = array("response" => "error", "message" => "Code déjà utilisé");
        } else {
            $status = array("response" => "success", "message" => "Validation en attente");

            $this->code->updateCode($code["idcode"], 1);
            $this->code->insertCodeUser($idUser, $code["idcode"]);
        }
        echo json_encode($status);
    }
}
