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
        else{
            $statue = array('response' => 'success',
                            'message' => $data['user']);
            $this->session->set_userdata('id',$data['user']['iduser']);
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

        
        if($genre == 1 || $genre == 2) {
            $this->user->insertUser($nom, $prenom, $genre, $dtn, $mail, $mdp);
            $statue = array('response' => 'success',
                            'message' => 'Insérer avec success');
        } else {
            $statue = array('response' => 'error',
                            'message' => 'Vérifier vos données');
        }
        
        
        echo json_encode($statue);
    }

    public function detailsInscription() {
        $idUser = $this->user->getIdLastUser()["idlastuser"];
        $taille = intval($this->input->post('taille'));
        $poids = intval($this->input->post('poids'));

        
        if(($taille == 0 || $poids == 0) || ($taille == 0 && $poids == 0)) {
            $statue = array('response' => 'error',
                            'message' => 'Vérifier vos données');
        } else {
            $this->user->insertDetailUser($idUser, $taille, $poids);
            $statue = array('response' => 'success',
                            'message' => 'Insérer avec success');
        }
           
        echo json_encode($statue);

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

    public function endSession(){
        $this->session->unset_userdata('id');

        
    }
    
}
