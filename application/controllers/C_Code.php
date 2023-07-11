<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Code extends CI_Controller {

    public function showAllCode() {
        $data["allcode"] = $this->code->getAllCode();

        $statue = array('response' => 'success',
                            'message' => $data['allcode']);

        echo json_encode($statue);
    }
       
}
