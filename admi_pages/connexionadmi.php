<?php

    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['valide'])){
        if(!empty($_POST['nom']) || !empty($_POST['pawd'])){          
            $nom = htmlspecialchars($_POST['nom']);
            $pwd = sha1($_POST['pawd']);

            $recupuadmi = $bdd->prepare('SELECT * FROM administrateurs WHERE nom = ? ||  pawd = ?');
            $recupuadmi->execute(array( $nom, $pwd));

            if($recupuadmi->rowCount() > 0){
                $_SESSION['nom'] = $nom;
                $_SESSION['pawd'] = $pwd;
               // $_SESSION['numero_utilisateur'] = $recuputilisateur->fecth()['numero_utilisateur'];
                header('Location: accueil1.php');

            }else{
                echo "votre mot de passe ou nom est incorrecte";
            }

        }else{
            echo "veuillez completez tous les champs....";
        }
    }
?>