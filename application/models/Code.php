<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Code extends CI_Model {
        
        public function updateCode($idCode) {
            $sql = "UPDATE code SET validitecode = 1 WHERE idcode = %d";

            $sql = sprintf($sql, $idCode);

            $this->db->query($sql);

        }

        public function getAllCode() {
            $result = array();

            $sql = "SELECT * FROM code";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;
        }

        public function getCode($numerocode) {
            $sql = "SELECT * FROM code WHERE numerocode = '%s'";

            $sql = sprintf($sql, $numerocode);

            $query = $this->db->query($sql);

            return $query->row_array();
        }

        public function validateCodeUser($idUser,$idCode) {
            $sql = "UPDATE codeuser SET validitecode = 1 WHERE iduser = %d AND idcode = %d";

            $sql = sprintf($sql, $idUser, $idCode);

            $this->db->query($sql);
        }

    }

?>