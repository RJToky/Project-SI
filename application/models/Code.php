<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Code extends CI_Model {

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

        public function updateCode($idCode, $statu) {
            $sql = "UPDATE code SET statu = %d WHERE idcode = %d";

            $sql = sprintf($sql, $statu, $idCode);

            $this->db->query($sql);
        }

        //statu = 1
        public function getAllCodeEnAttente($statu) {
            $result = array();

            $sql = "SELECT * FROM code WHERE statu = %d";

            $sql = sprintf($sql, $statu);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;
        }


    }

?>