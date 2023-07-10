<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model {
        
        public function getUser($email, $password) {
            $sql = "SELECT * FROM users WHERE mailUser = '%s' AND mdpUser = md5('%s') ";

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
            $sql = "INSERT INTO detailUser VALUES (default, %d, %d, %d, NOW())";

            $sql = sprintf($sql, $idUtilisateur, $taille, $poids);

            $this->db->query($sql);
        }

        public function getIdLastUser() {

            $sql = "SELECT COUNT(idUser) as idLastUser FROM users";

            $query = $this->db->query($sql);

            

            return $query->result_array()[0];
        }

        public function getSuperUser($email, $password) {
            $sql = "SELECT * FROM SuperUser WHERE mailSuperUser = '%s' AND mdpSuperUser = md5('%s') ";

            $sql = sprintf($sql, $email, $password);

            $query = $this->db->query($sql);

            $result = $query->row_array();

            return $result;
        }
    }

?>