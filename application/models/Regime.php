<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Regime extends CI_Model {
        
       public function insertRegime($nomregime, $idobjectif, $poids1, $poids2) {
            $sql = "INSERT INTO regime VALUES (default, '%s', %d, %d, %d)";

            $sql = sprintf($sql, $nomregime, $idobjectif, $poids1, $poids2);

            $this->db->query($sql);
       }

       public function getRegimeByObjectif($idObjectif) {
            $result = array();

            $sql = "SELECT * FROM regime WHERE idobjectif = %d";

            $sql = sprintf($sql, $idObjectif);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            return $result;
       }

       public function deleteRegime($idRegime) {
            $sql = "DELETE FROM regime WHERE idregime = %d";

            $sql = sprintf($sql, $idRegime);

            $this->db->query($sql);
       }

       public function updateRegime($idregime, $nomregime, $idobjectif, $poids1, $poids2) {
            $sql = "UPDATE regime SET nomregime = '%s', idobjectif = %d, poids1 = %d, poids2 = %d WHERE idregime = %d";

            $sql = sprintf($sql, $nomregime, $idobjectif, $poids1, $poids2, $idregime);

            $this->db->query($sql);

       }

       public function insertDetailRegime($idregime, $idplat, $idsport) {
            $sql = "INSERT INTO detailregime VALUES (default, %d, %d, %d)";

            $sql = sprintf($sql, $idregime, $idplat, $idsport);

            $this->db->query($sql);
       }


       //---------------------------------------------------

       public function calorieAPerdreouAGagner($kilo) {
            $kg = $this->getKgCalorie()["kg"];
            $calorie = $this->getKgCalorie()["calorie"];

            $result = ($calorie * intval($kilo)) / $kg;

            return intval($result);
       }

        public function getRegime($idRegime) {
            $sql = "SELECT * FROM regime WHERE idregime = %d";

            $sql = sprintf($sql, $idRegime);

            $query = $this->db->query($sql);

            return $query->result_array()[0];
        }

       public function getKgCalorie() {
            $sql = "SELECT * FROM kgcalorie";

            $query = $this->db->query($sql);

            return $query->result_array()[0];
        }

        public function dureeRegime($idObjectif, $kilo) {
            $result = array();

            $sql = "SELECT * FROM v_diffplatsport WHERE idobjectif = %d";

            $sql = sprintf($sql, $idObjectif);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $diff = abs(intval($row["diffplatsport"]));
                $duree = $this->calorieAPerdreouAGagner($kilo)/$diff;
                $prix = $this->getPrixRegime(ceil($duree));
                
                $regime = array(
                    "nomregime" => $row["nomregime"],
                    "nomobjectif" => $row["nomobjectif"],
                    "duree" => ceil($duree),
                    "prix" => $prix["prixregime"]
                );

                array_push($result, $regime);
            }

            return $result;
        }

        public function getPrixRegime($interv) {
            if($interv > 0 && $interv <= 120) {
                $sql = "SELECT prixregime FROM prixregime WHERE %d >= intervalle1 AND %d <= intervalle2";
            } else if($interv >= 121) {
                $sql = "SELECT prixregime FROM prixregime WHERE %d >= intervalle1";
            }
            

            $sql = sprintf($sql, $interv, $interv);

            $query = $this->db->query($sql);

            return $query->row_array();

        }

        public function listePlatSportByRegime($idRegime) {

            $result = array();
            $sql = "SELECT * FROM v_platsportregime WHERE idregime = %d";

            $sql = sprintf($sql, $idRegime);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $plat = array(
                    "plat" => $row["nomplat"],
                    "apportcalorie" => $row["apportcalorieplat"]
                );

                $sport = array(
                    "sport" => $row["nomsport"],
                    "deficitcalorie" => $row["deficitcalorie"]
                );

                array_push($result, $plat);
                array_push($result, $sport);
            }

            return $result;

        }
       

    }

?>