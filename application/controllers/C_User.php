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
            $statue = array('statue' => 'auncun resultat');
        
        }
        else{
            $statue = array('statue' => 'connect',
                            'user' => $data['user']);
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
            $statue = array('statue' => 'inserer avec success');
        } else {
            $statue = array('statue' => 'erreur');
        }
        
        
        echo json_encode($statue);
    }

    public function detailsInscription() {
        $idUser = $this->user->getIdLastUser()["idlastuser"];
        $taille = intval($this->input->post('taille'));
        $poids = intval($this->input->post('poids'));

        
        if($taille == 0 || $poids == 0) {
            $statue = array('statue' => 'erreur');
        } else {
            $this->user->insertDetailUser($idUser, $taille, $poids);
            $statue = array('statue' => 'inserer avec success');
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
            $statue = array('statue' => 'auncun resultat');
        
        }
        else{
            $statue = array('statue' => 'connect',
                            'user' => $data['superUser']);
        }

        echo json_encode($statue);
    }
    
}
