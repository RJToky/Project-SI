<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Objectif extends CI_Model {
        
        public function getAllObjectif() {
            $result = array();

            $sql = "SELECT * FROM objectif";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;
            
        }

    }

?>