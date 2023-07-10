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
  
    
}
