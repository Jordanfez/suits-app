<?php

    session_start();
    $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['valider'])){
        if(!empty($_POST['nom']) AND !empty($_POST['pwd'])){
            $nom = htmlspecialchars($_POST['nom']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $insertion = $bdd->prepare('INSERT INTO connexions( nom, pwd)VALUES( ?, ?)');
            $insertion->execute(array($nom, $pwd));

            $recupclient = $bdd->prepare('SELECT * FROM connexions WHERE  nom = ? AND pwd = ?');
            $recupclient->execute(array( $nom, $pwd));
            if($recupclient->rowCount() > 0){
                $_SESSION['nom'] = $nom;
                $_SESSION['pwd'] = $pwd;
            }
            //echo $_SESSION['id'];

        }else{
            echo "veuillez compltez les champs...";
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interfaces</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

</head>

<body>
  
  <div id="login-page">
    <div class="container" id="login-form">
      <form class="form-login"  action="" METHOD="POST">
        <h2 class="form-login-heading">ADMINISTRATEURS</h2>
        <div class="login-wrap">
          <input type="text" name="nom" class="form-control" placeholder="NOM ADMINISTRATEUR" required="" autocomplete="off"><br>
          <input type="password" name="pwd" class="form-control" placeholder="Mot de passe ADMINISTRATEUR" required="" autocomplete="off">
          <br>
          <button name="valieer" class="btn btn-theme btn-block" type="submit" style="color: white;">Valider</button>
          <button data-dismiss="modal" class="btn btn-theme btn-block" type="reset">Annuler</button>
          </div>
        </div>
       
      </form>
    </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/Technicien.jpg", {
      speed: 500
    });
    $("#singin-form").hide();
    $("#create-count").click(
      function(){
        $("#login-form").hide();
        $("#singin-form").fadeIn();
      }
    );
    $("#connect-form").click(
      function(){
        $("#singin-form").hide();
        $("#login-form").fadeIn();
      }
    );
  </script>
</body>

</html>
