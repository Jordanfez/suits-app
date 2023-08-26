<?php

    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['valider'])){
        if(!empty($_POST['nom']) AND !empty($_POST['pwd'])){          
            $nom = htmlspecialchars($_POST['nom']);
            $password = htmlspecialchars($_POST['pwd']);

            $recuputilisateur = $bdd->prepare('SELECT * FROM utilisateurs WHERE nom = ? AND  pwd = ?');
            $recuputilisateur->execute(array( $nom, $password));

            if($recuputilisateur->rowCount() > 0){
                $_SESSION['nom'] = $nom;
                $_SESSION['pwd'] = $password;
               // die($nom) ;
               // $_SESSION['numero_utilisateur'] = $recuputilisateur->fecth()['numero_utilisateur'];
                header('Location: accueil.php');

            }else{
                echo "votre mot de passe ou nom est incorrecte";
            }

        }else{
            echo "veuillez completez tous les champs....";
        }
    }
?>