<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model {
        
        public function getUser($email, $password) {
            $sql = "SELECT * FROM users WHERE mailuser = '%s' AND mdpuser = md5('%s') ";

            $sql = sprintf($sql, $email, $password);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
            
        }

        public function insertUser($nom, $prenom, $genre, $dtn, $mail, $mdp) {
            $sql = "INSERT INTO users VALUES (default, '%s', '%s', %d, '%s', '%s', md5('%s'))";

            $sql = sprintf($sql, $nom, $prenom, $genre, $dtn, $mail, $mdp);

            $this->db->query($sql);
        }

        public function insertDetailUser($idUtilisateur, $taille, $poids) {
            $sql = "INSERT INTO detailuser VALUES (default, %d, %d, %d, NOW())";

            $sql = sprintf($sql, $idUtilisateur, $taille, $poids);

            $this->db->query($sql);
        }

        public function getIdLastUser() {

            $sql = "SELECT COUNT(iduser) as idlastuser FROM users";

            $query = $this->db->query($sql);

            

            return $query->result_array()[0];
        }

        public function getSuperUser($email, $password) {
            $sql = "SELECT * FROM superuser WHERE mailsuperuser = '%s' AND mdpsuperuser = md5('%s') ";

            $sql = sprintf($sql, $email, $password);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
        }

        public function insertRegimePersonne($idUser, $idObjectif) {
            $sql = "INSERT INTO regimepersonne VALUES (default, %d, %d)";
  
            $sql = sprintf($sql, $idUser, $idObjectif);
  
            $this->db->query($sql);
        }

        public function countUser() {
            $sql = "SELECT count(iduser) as nbuser FROM users";

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
        }

        public function countUserByObjectif($idObjectif) {
            $sql = "SELECT count(iduser) as nbuser FROM regimepersonne WHERE idobjectif = %d";

            $sql = sprintf($sql, $idObjectif);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
        }

        public function initialisePorteMonnaie($idUser) {
            $sql = "INSERT INTO portemonnaieuser VALUES (default, %d, 0)";

            $sql = sprintf($sql, $idUser);

            $this->db->query($sql);
        }

        public function updatePorteMonnaie($idUser, $montant) {
            $sql = "UPDATE portemonnaieuser SET montant = %g WHERE iduser = %d";

            $sql = sprintf($sql, $montant, $idUser);

            $this->db->query($sql);
        }

        public function achatUser($idUser, $montant, $idregime, $confirmationachat) {
            $sql = "INSERT INTO achatuser VALUES (default, %d, %g, %d, %d, NOW())";

            $sql = sprintf($sql, $idUser, $montant, $idregime, $confirmationachat);

            $this->db->query($sql);
        }

        public function chiffreAffaire() {
            $sql = "SELECT SUM(montant) as chiffreaffaire FROM achatuser";

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
            
        }

        public function statistiqueParMontant() {
            $result = array();

            $sql = "SELECT montant, dateachat FROM achatuser";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;

        }

        public function statistiqueParPoids() {
            $result = array();

            $sql = "SELECT avg(poidsuser) as moyenne, dateupdatedetailuser FROM detailuser GROUP BY dateupdatedetailuser";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;

        }

        public function getDetailUser($iduser) {
            $sql = "SELECT * FROM detailuser WHERE iduser = %d";

            $sql = sprintf($sql, $iduser);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
        }


    }

?>