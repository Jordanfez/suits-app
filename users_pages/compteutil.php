<?php
    session_start() ;
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
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <script src="plugins/jquery/jquery-3.3.1.min.js"></script>
    <script>
        $(function (){
            $("#login_form").animate({
                left: '30%',
                opacity: 1
            }, 2000);
        })
    </script>

</head>

<body style='background-color: black;'>

    <div id="login_form" style="width: 40%; opacity: 0; position: absolute; background-color: white; margin-top: 5%; border-radius: 10%">
        <form class="pola" action="" method="post" style="margin: 3%; margin-bottom: 3%">
            <h1 style="text-align: center">Changer votre mot de passe</h1>
            <hr>
            <div>
            <input id="numero" type="text" name="numero" class="form-control" placeholder="Entrer votre matricule" required="" autocomplete="off">
            </div><br>
            <div>
            <input id="passe" type="password" name="passe" class="form-control" placeholder="Entrer le mot de passe actuel" required="" autocomplete="off">
            </div>
            <br>
            <div>
            <input id="passe1" type="password" name="passe1" class="form-control" placeholder="Entrer le nouveau mot de passe" required="" autocomplete="off">
            </div>
            <br>
            <div>
            <input id="passe2" type="password" name="passe2" class="form-control" date-parsley-equalto="passe1" placeholder="Confirmer le mot de passe" required="" autocomplete="off">
            </div>
            <br>
            <div>
                <p>
                 <button id="submit" name="changepass" class="btn btn-theme btn-block" type="submit" style="color: white;">Valider</button> &nbsp; <br>
                 <button style="background-color: turquoise; border-bottom-left-radius: 2%; "  type="submit"><a href="accueil.php" style="color: white;">Page precedande</a></button> 
                </p>
            </div> 
            <?php

              $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
              if (isset($_POST['changepass'])){
                if(!empty($_POST['numero']) || !empty($_POST['passe']) || !empty($_POST['passe1']) || !empty($_POST['passe2'])){
                    $code = htmlspecialchars($_POST['numero']);
                    $passe = htmlspecialchars($_POST['passe']);
                    $passe1 = htmlspecialchars($_POST['passe1']);
                    $passe2 = htmlspecialchars($_POST['passe2']);

                    if( $passe1 == $passe2){

                    $insertion = $bdd->prepare("UPDATE utilisateurs SET pwd = '$passe2' WHERE numero_utilisateur = '$_POST[numero]' ");
                    $insertion->execute(array($passe2));

                    }else{
                      ?>
                        <h6 style="color: red; text-align: center"> La premiere valeur du mot de passe a modifier doit etre identique a la seconde <br><br> ECHEC DE La MISE A JOUR </h6>
                     <?php
                    } 
                }
              }
            ?>

        </form>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="sweetalert/sweetalert.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>

  <script>
      $("#submit").click(function(){
         var numero = $("#numero").val();
         var passe = $("#passe").val();
         var passe1 = $("#passe1").val();
         var passe2 = $("#passe2").val();

         if(numero == '' || passe == '' || passe1 == '' || passe2 == ''){

              swal({
                  title: "Invalide",
                  text: "Verifier si tout les champs son bien remplis!",
                  icon: "info",
                  button: "ok",
            });
         }else{
              swal({
                  title: "Good job!",
                  text: "Mise a jours effectuer avec success",
                  icon: "success",
                  button: "OK",
            });
         }
      });
  </script>
</body>

</html>
