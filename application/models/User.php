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

        public function insertRegimePersonne($idUser, $idObjectif, $poidsvisee) {
            $sql = "INSERT INTO regimepersonne VALUES (default, %d, %d, %d)";
  
            $sql = sprintf($sql, $idUser, $idObjectif, $poidsvisee);
  
            $this->db->query($sql);
        }

        public function countUser() {
            $sql = "SELECT count(iduser) as nbuser FROM users";

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result["nbuser"];
        }

        public function getRegimePersonne($idUser) {
            $sql = "SELECT * FROM regimepersonne WHERE iduser = %d";

            $sql = sprintf($sql, $idUser);

            $query = $this->db->query($sql);

            return $query->row_array();

        }

        public function countUserByObjectif($idObjectif) {
            $sql = "SELECT count(iduser) as nbuser FROM regimepersonne WHERE idobjectif = %d";

            $sql = sprintf($sql, $idObjectif);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result["nbuser"];
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

        public function achatUser($idUser, $montant, $idregime, $confirmationachat = 1) {
            $sql = "INSERT INTO achatuser VALUES (default, %d, %g, %d, %d, NOW())";

            $sql = sprintf($sql, $idUser, $montant, $idregime, $confirmationachat);

            $this->db->query($sql);
        }

        public function chiffreAffaire() {
            $sql = "SELECT SUM(montant) as chiffreaffaire FROM achatuser";

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result["chiffreaffaire"];
            
        }

        public function statistiqueParMontant() {
            $result = array();

            $sql = "SELECT dateachat, avg(montant) as moyenne FROM achatuser GROUP BY dateachat ORDER BY dateachat ASC";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;

        }

        public function statistiqueParPoids() {
            $result = array();

            $sql = "SELECT dateupdatedetailuser, avg(poidsuser) as moyenne FROM detailuser GROUP BY dateupdatedetailuser ORDER BY dateupdatedetailuser ASC";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;

        }

        public function dernierTransaction($idUser, $kilo) {
            $result = array();

            $sql = "SELECT * FROM v_derniertransaction WHERE iduser = %d";

            $sql = sprintf($sql, $idUser);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $diff = abs(intval($row["diffplatsport"]));
                $duree = $this->reg->calorieAPerdreouAGagner($kilo)/$diff;
                
                $regime = array(
                    "montant" => $row["montant"],
                    "idobjectif" => $row["idobjectif"],
                    "duree" => ceil($duree),
                    "nomregime" => $row["nomregime"],
                    "dateachat" => $row["dateachat"]
                );

                array_push($result, $regime);
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

        public function getSolde($iduser) {
            $sql = "SELECT * FROM portemonnaieuser WHERE iduser = %d";

            $sql = sprintf($sql, $iduser);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result["montant"];
        }

        public function getPoids($iduser) {
            $sql = "SELECT poidsuser FROM detailuser WHERE iduser = %d";

            $sql = sprintf($sql, $iduser);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result["poidsuser"];
        }

        
        public function getPoidsVisee($iduser) {
            $sql = "SELECT poidsvisee FROM regimepersonne WHERE iduser = %d";

            $sql = sprintf($sql, $iduser);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result["poidsvisee"];
        }

        public function has_done_completion($idUser) {
            $sql = "SELECT count(iduser) count FROM detailuser WHERE iduser = %d";

            $sql = sprintf($sql, $idUser);

            $query = $this->db->query($sql);

            $result = $query->row_array();
            if($result["count"] == 0) { return false; }

            return true;
            return $result["count"];
        }


    }

?>