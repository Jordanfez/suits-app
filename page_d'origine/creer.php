<?php

    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['valider'])){
        if(!empty($_POST['nom']) AND !empty($_POST['pwd'])){          
            $nom = htmlspecialchars($_POST['nom']);
            $password = htmlspecialchars($_POST['pwd']);
            $insertion = $bdd->prepare('INSERT INTO comptead( nom, pwd)VALUES(?, ?)');
            $insertion->execute(array($nom, $password));

            $recuputilisateur = $bdd->prepare('SELECT * FROM comptead WHERE nom = ? AND  pwd = ?');
            $recuputilisateur->execute(array( $nom, $password));
            if($recuputilisateur->rowCount() > 0){
                $_SESSION['nom'] = $nom;
                $_SESSION['pwd'] = $password;
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="w3.css">
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
    <title>liste</title>
    <script>
        .tr{
            margin: 10px;
        }
    </script>
</head>
<body>
        
    <div class="container" id="singin-form">
      <form class="form-login" action="" method="POST">
        <h2 class="form-login-heading">ADMINISTRATEUR</h2>
        <div class="login-wrap">
          <input type="text" name="matricule" class="form-control" placeholder="MATRICULE" >
          <br>
          <input name="pwd" type="password"  class="form-control" placeholder="Mot de passe" >
          <br><br>
          <button name="envoi" class="btn btn-theme btn-block" type="submit" style="color: white;" >Valider</button>
          <br>
          <button class="btn btn-theme btn-block" type="reset" style="color: white;" >Annuler</button>
          <hr>
          <div class="registration">
            RETOUR!! <br>
            <a class="" href="index.php" id="connect-form"> <br>
              LOGIN
            </a>
          </div>
       </div>
</body>
</html>