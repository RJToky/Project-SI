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

        public function allImg() {
            $result = array();

            $sql = "SELECT * FROM photosport UNION SELECT * FROM photoplat";

            $sql = sprintf($sql);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $result [] = $row;
            }

            $output = array();
            for($i = 0; $i < count($result); $i++) {
                array_push($output, $result[$i]["photosport"]);
            }

            return $output;
        }

        public function getRandomIndices($arraySize, $numIndices) {
            $indices = range(0, $arraySize - 1);
            shuffle($indices);
            return array_slice($indices, 0, $numIndices);
        }

        public function dureeRegime($idObjectif, $kilo) {
            $result = array();

            $allImg = $this->reg->allImg();

            $sql = "SELECT * FROM v_diffplatsport WHERE idobjectif = %d";

            $sql = sprintf($sql, $idObjectif);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $diff = abs(intval($row["diffplatsport"]));
                $duree = $this->calorieAPerdreouAGagner($kilo)/$diff;
                $prix = $this->getPrixRegime(ceil($duree));

                
                $randomIndices = $this->reg->getRandomIndices(count($allImg), 5);
                $randomImg = array();
                for($i = 0; $i < count($randomIndices); $i++) {
                    array_push($randomImg, $allImg[$randomIndices[$i]]);
                }
                
                $regime = array(
                    "idregime" => $row["idregime"],
                    "listphoto" => $randomImg,
                    "nomregime" => $row["nomregime"],
                    "idobjectif" => $row["idobjectif"],
                    "duree" => ceil($duree),
                    "prix" => $prix["prixregime"]
                );

                array_push($result, $regime);
            }

            return $result;
        }

        public function dureeByIdRegime($idObjectif, $kilo, $idregime) {
            $result = array();

            $sql = "SELECT * FROM v_diffplatsport WHERE idobjectif = %d and idregime = %d";

            $sql = sprintf($sql, $idObjectif, $idregime);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $diff = abs(intval($row["diffplatsport"]));
                $duree = $this->calorieAPerdreouAGagner($kilo)/$diff;
                $prix = $this->getPrixRegime(ceil($duree));
                
                $regime = array(
                    "idregime" => $row["idregime"],
                    "nomregime" => $row["nomregime"],
                    "idobjectif" => $row["idobjectif"],
                    "duree" => ceil($duree),
                    "prix" => $prix["prixregime"]
                );

                array_push($result, $regime);
            }

            return $result[0];
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
                    "nature" => "plat",
                    "nom" => $row["nomplat"],
                    "photo" => $row["photoplat"],
                    "apportcalorie" => $row["apportcalorieplat"]
                );

                $sport = array(
                    "nature" => "sport",
                    "nom" => $row["nomsport"],
                    "photo" => $row["photosport"],
                    "deficitcalorie" => $row["deficitcalorie"]
                );

                array_push($result, $plat);
                array_push($result, $sport);
            }

            return $result;

        }

       public function getPoidsMoyenByDate ($idObjectif) {
          $result = array();

          $sql = "SELECT * FROM v_poidsmoyen WHERE idobjectif = %d";

          $sql = sprintf($sql, $idObjectif);

          $query = $this->db->query($sql);

          foreach($query->result_array() as $row) {

              $poidsdate = array(
                  "poidsmoyen" => $row["poidsmoyen"],
                  "dateupdatedetailuser" => $row["dateupdatedetailuser"]
              );

              array_push($result, $poidsdate);
          }

          return $poidsdate;
     }
       

        public function insertPrixRegime($intervalle1, $intervalle2, $prixregime) {
            $sql = "INSERT INTO prixregime VALUES (default, %d, %d, %g)";

            $sql = sprintf($sql, $intervalle1, $intervalle2, $prixregime);

            $this->db->query($sql);
        }

        public function updatePrixRegime($idprixregime, $intervalle1, $intervalle2, $prixregime) {
            $sql = "UPDATE prixregime SET intervalle1 = %d, intervalle2 = %d, prixregime = %g WHERE idprixregime = %d";

            $sql = sprintf($sql, $intervalle1, $intervalle2, $prixregime, $idprixregime);

            $this->db->query($sql);
        }

        public function deletePrixRegime($idPrixRegime) {
            $sql = "DELETE FROM prixregime WHERE idprixregime = %d";

            $sql = sprintf($sql, $idPrixRegime);

            $this->db->query($sql);
        }

    }

?>