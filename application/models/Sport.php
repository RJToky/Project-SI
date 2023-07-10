<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sport extends CI_Model {
        
       public function getAllSport() {
            $result = array();

            $sql = "SELECT * FROM sport";
            
            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;
       }

       public function insertSport($nomSport, $deficitCalorie) {
            $sql = "INSERT INTO sport VALUES(default, '%s', %d)";

            $sql = sprintf($sql, $nomSport, $deficitCalorie);

            $this->db->query($sql);

       }

       public function updateSport($idSport, $nomSport, $deficitCalorie) {
            $sql = "UPDATE sport SET nomsport = '%s', deficitcalorie = %d WHERE idsport = %d";

            $sql = sprintf($sql, $nomSport, $deficitCalorie, $idSport);

            $this->db->query($sql);

       }

       public function deleteSport($idSport) {
            $sql = "DELETE FROM sport WHERE idsport = %d";

            $sql = sprintf($sql, $idSport);

            $this->db->query($sql);

       }

       public function getPhotoSportByPhoto($idSport) {
        $sql = "SELECT * FROM photosport WHERE idsport = %d";

        $sql = sprintf($sql, $idSport);
            
        $query = $this->db->query($sql);

        return $query->result_array()[0];

       }

       public function insertPhotoSport($idSport, $photoSport) {
            $sql = "INSERT INTO photosport VALUES(%d, '%s')";

            $sql = sprintf($sql, $idSport, $photoSport);

            $this->db->query($sql);
       }

       public function deletePhotoSport($idSport) {
            $sql = "DELETE FROM photosport WHERE idsport = %d";

            $sql = sprintf($sql, $idSport);

            $this->db->query($sql);
       }

       public function updatePhotoSport($idSport, $photoSport) {
            $sql = "UPDATE photosport SET photosport = '%s' WHERE idsport = %d";

            $sql = sprintf($sql, $photoSport, $idSport);

            $this->db->query($sql);
       }

    }

?>