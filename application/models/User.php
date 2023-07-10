<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model {
        
        public function getUser($email, $password) {
            $sql = "SELECT * FROM users WHERE mailUser = '%s' AND mdpUser = '%s' ";

            $sql = sprintf($sql, $email, $password);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
            
        }

        public function insertUser($nom, $prenom, $mail, $mdp) {
            $sql = "INSERT INTO users VALUES (default, '%s', '%s', '%s', '%s')";

            $sql = sprintf($sql, $nom, $prenom, $mail, $mdp);

            $this->db->query($sql);
        }

        public function insertDetailUser($idUtilisateur, $taille, $poids, $dateUpdate) {
            $sql = "INSERT INTO detailUser VALUES (default, %d, %d, %d, '%s')";

            $sql = sprintf($sql, $idUtilisateur, $taille, $poids, $dateUpdate);

            $this->db->query($sql);
        }

        public function getIdLastUser() {
            $result = array();

            $sql = "SELECT COUNT(idUser) as idLastUser FROM users";

            $query = $this->db->query($sql);

            $result [] = $query->result_array()[0];

            return $result["idUser"];
        }
    }

?>