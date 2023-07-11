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

        public function getIdObjectifByUser($iduser) {
            $sql = "SELECT * FROM regimepersonne WHERE iduser = %d";

            $sql = sprintf($sql, $iduser);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result["idobjectif"];
        }

    }

?>