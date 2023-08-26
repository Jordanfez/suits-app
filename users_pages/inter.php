<?php


    $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=ut8;', 'root', '');
    if(!empty($_POST)){
        extract($_POST);
        $valid = (boolean) true;

        if(isset($_POST['enregistrement'])){
            $numero_intervention = (string) trim($numero_intervention);
            $dates = (string) trim($dates);
            $nature = (string) trim($nature);
            $durée = (string) trim($durée);
            $observation = (string) trim($observation);
            $matricule_technicien = (string) trim($matricule_technicien );

            if(empty($numero)){
                $valid = false;
                $err_numero = "veuiillez completez se champs";
            }
            
            if(empty($date)){
                $valid = false;
                $err_date = "veuiillez completez se champs";
            }
            
            if(empty($nature)){
                $valid = false;
                $err_nature = "veuiillez completez se champs";
            }
            
            if(empty($durée)){
                $valid = false;
                $err_durée = "veuiillez completez se champs";
            }
            
            if(empty($observation)){
                $valid = false;
                $err_observation = "veuiillez completez se champs";
            }
            
            if(empty($matricule)){
                $valid = false;
                $err_matricule = "veuiillez completez se champs";
            }

            if($valid){

                $req = $bdd->prepare("INSERT INTO intervention (numero_intervention, dates, nature, durée, observation, matricule_technicien)VALUES(?, ?, ?, ?, ?, ?)");
                $req->execute(array($numero_intervention, $dates, $nature, $durée, $observation, $matricule));
            }
        }
    }

  

?>