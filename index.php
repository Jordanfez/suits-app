<?php

    session_start();

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
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
  <link href="nprogress.css" rel="stylesheet">
  
  <link href="custom.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
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

<body  style='background-color: #1690A7';>
 
<div id="login_form" style=" width: 70%; opacity: 0; position: absolute;" >
<form action="" method="POST"novalidate style="margin: 3%; margin-bottom: 3%">
      <h2 class="form-login-heading">AUTHENTIFICATION</h2>
      <hr>
        <div class="login-wrap">
          
        <div class="field item form-group">
          <label class="col-form-label col-md-3 col-sm-3  label-align" for="name"><strong> NOM :</strong></label>	&nbsp &nbsp &nbsp 
											<div class="col-md-6 col-sm-6">
											<input class="form-control" type="text" name="login" placeholder="ENTREZ VOTRE NOM" autocomplete="off"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{20,}" title="Minimum 20 Caractères incluant uniquement des lettres" required="" />
												
											</div>
					</div>
          <br>
          <div class="field item form-group">
          <label class="col-form-label col-md-3 col-sm-3  label-align" for="PWD"><strong>PASSWORD:  </strong> </label>&nbsp &nbsp &nbsp 
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="password" id="password1" name="pwd" placeholder=" MOT DE PASSE" autocomplete="off"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Caractères incluant des lettre, et des chiffres si nécessaire" required="" />
												
												<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
											</div>
							</div>
          <br>
          <div>
             <button name="valider" class="btn btn-theme btn-block" type="submit" style="color: white;">CONNEXION</button>
          </div>
          <hr>
          <div>
                <h1 style="text-align: center">SUITS</h1>
                <p style="text-align: center">©2021 ICT BUSINNESS CENTER <br> All Rights Reserved.</p>
          </div>
        <?php
                //connexion à la base de données
                $con = new mysqli("localhost", "root", "", "lsdi") or die("Erreur de connexion") ;
                
                if(isset($_POST['valider'])){
                    //recuperation des données provenant du login form
                    $_SESSION['login'] = mysqli_real_escape_string($con, trim(htmlspecialchars($_POST['login']))) ;
                    $login = $_SESSION['login'];
                    $pwd = mysqli_real_escape_string($con, trim(htmlspecialchars($_POST['pwd']))) ;
                    
                    //execution de la requete
                    $sql = " SELECT * FROM utilisateurs WHERE nom ='$login' AND pwd='$pwd' AND etat = 'on' " ;
                    $requete = mysqli_query($con, $sql) or die("Erreur d'exécution de la requete") ;
                    $result = mysqli_fetch_assoc($requete) ;

                    //verifications 
                    if(count($result) > 0){
                        //creation de la variable de session
                        $_SESSION['login'] = $login;
                        $_SESSION['pwd'] = $pwd;

                        if(isset($_POST['valider'])){

                          if(isset($_POST['nom'])){
                            require 'main.php';
                            if(isset($_POST['valider'])){

                              $tache =  "connexion";
                              $description = "Mr"." ".$login." a effectuer une connexion le";
                              $date = "le".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
                              $insertion = $bdd->prepare("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
                              $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
                           
                             }
                          }
                        }
                        header("location: users_pages/accueil.php") ;
                    }
                    else{
                        $sql1 = " SELECT * FROM administrateurs WHERE nom = '$login' AND pwd = '$pwd' AND etat = 'on' " ;
                        $requete1 = mysqli_query($con, $sql1) or die("Erreur d'exécution de la requete2") ;
                        $result1 = mysqli_fetch_assoc($requete1) ;
                        if(count($result1) > 0){
                            //creation de la variable de session
                            $_SESSION['login'] = $nom ;
                            $_SESSION['pwd'] = $pwd;

                            if(isset($_POST['valider'])){

                              if(isset($_POST['nom'])){
                                require 'main.php';
                                if(isset($_POST['valider'])){
    
                                  $tache =  "connexion";
                                  $description = "Mr"." ".$login." a effectuer une connexion le";
                                  $date = "le".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
                                  $insertion = $bdd->prepare("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
                                  $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
                               
                                 }
                              }
                            }
                            header("location: admi_pages/accueil1.php") ;
                        }
                        else {
                            session_destroy();
                                ?>
                                    <h4 style="color: red; text-align: center">Votre ' Mot de passe ' ou votre ' Nom ' est soit vide, soit incorrecte!!! </h4>
                                <?php
                        }
                    }
                }
            ?>
     </form>
     </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
   // $.backstretch("img/Technicien.jpg", {
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
  <script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>
</body>

</html>
