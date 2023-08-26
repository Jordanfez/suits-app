<?php

    session_start();
      if (isset($_POST['envoi'])){
        if(!empty($_POST['numero_utilisateur']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['adresse']) || !empty($_POST['roles']) || !empty($_POST['pwd']) ){
          $code = htmlspecialchars($_POST['numero_utilisateur']);
          $nom = htmlspecialchars($_POST['nom']);
          $prenom = htmlspecialchars($_POST['prenom']);
          $telephone = htmlspecialchars($_POST['adresse']);
          $fax = htmlspecialchars($_POST['roles']);
          $pwd = htmlspecialchars($_POST['pwd']);
          $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
          $db = mysql_select_db("lsdi") or die(mysql_error()) ;
          $requete = "INSERT INTO utilisateurs(numero_utilisateur, nom, prenom, adresse, roles, pwd, etat) VALUES('$code', '$nom', '$prenom', '$telephone', '$fax','$pwd', 'on') " ;
          $sql = mysql_query($requete, $con) or die(mysql_error()) ;
          header("location: utilisateur.php ") ;
        }else{
          echo "veuillez rempire tout les chemps...";
        }
      }
      // enregistrement du traitement
      if(isset($_POST['envoi'])){

        $tache =  "ENREGISTREMENT";
        $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer  l'enregistrement de Mr/Mme"." ".$_SESSION['nom']." ";
        $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
        $insertion = $bdd->prepare("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
        $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport-width" content="width=device, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Enregistrement utilisateur</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body style =" background-image: url('img/Technic.jpg')">
    <section id="container">
        <!-- **********************************************************************************************************************************************************
            TOP BAR CONTENT & NOTIFICATIONS
            *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg" style="right: 1%; position: relative; margin-top: -0.7%;">
          <!--logo start-->
          <!--a class="logo"><b>INTER<span>VENTION</span></b></a-->
          <!--logo end-->
          <a class="logo"><b>UTILI<span>SATEUR</span></b></a>
    
          <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a  href="accueil1.php" style=" margin-top:23%; color: aliceblue;">Menu</a></li>
          <li><a class="logout" href="login.html">DECONNEXION</a></li>
        </ul>
      </div>
    </header>
      <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
  
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="sweetalert/sweetalert.min.js"></script>
    <script src="lib/jquery.sparkline.js"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="lib/gritter-conf.js"></script>
    <!--script for this page-->
    <script src="lib/sparkline-chart.js"></script>
    <script src="lib/zabuto_calendar.js"></script>
    <script type="application/javascript">
      $(document).ready(function() {
        $("#date-popover").popover({
          html: true,
          trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
          $(this).hide();
        });
  
        $("#my-calendar").zabuto_calendar({
          action: function() {
            return myDateFunction(this.id, false);
          },
          action_nav: function() {
            return myNavFunction(this.id);
          },
          ajax: {
            url: "show_data.php?action=1",
            modal: true
          },
          legend: [{
              type: "text",
              label: "Special event",
              badge: "00"
            },
            {
              type: "block",
              label: "Regular event",
            }
          ]
        });
      });
  
      function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
      }
    </script>

<div id="login-page">
    <div class="container" style="margin-top: -5%; text-align:center; position: relative; left: -13%;">
      <form class="form-login" action="" method="POST">
        <!-- Modal -->
        <div id="myModal" >
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="">AJOUTER UN UTILISATEUR</h4>
              </div>
              <div class="modal-body">
              <br> 
              <div> 
                    <label for=""  class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;"> MATRICULE</label>
                    <div class="col-sm-10">
                    <input id="code" maxlength="20" minlength="1" type="text" name="numero_utilisateur" placeholder="MATRICULE UTILISATEUR"  autocomplete="off" class="form-control placeholder-no-fix" required="" /><br>
                    </div>
              </div>
              <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;">NOM</label>
                    <div class="col-sm-10">
                    <input id="nom" maxlength="25" minlength="1" type="text" name="nom" placeholder="NOM UTILISATEUR" autocomplete="off" class="form-control placeholder-no-fix" required="" /><br>
                    </div>
               </div> 
               <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;"> PRENOM</label>
                    <div class="col-sm-10">
                    <input id="prenom" maxlength="25" minlength="1" type="text" name="prenom" placeholder="PRENOM UTILISATEUR" autocomplete="off" class="form-control placeholder-no-fix" required="" /><br>
                    </div>
               </div> 
               <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;"> ADRESSE</label>
                    <div class="col-sm-10">
                    <input id="adresse"maxlength="25" minlength="1" type="text" name="adresse" placeholder="ADRESSE" autocomplete="off" class="form-control placeholder-no-fix" required="" /><br>
                    </div>
               </div> 
               <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;"> RÔLE</label>
                    <div class="col-sm-10">
                    <input id="adresse"maxlength="15" minlength="1" type="text" name="role" placeholder="RÔLE" autocomplete="off" class="form-control placeholder-no-fix" required="" /><br>
                    </div>
               </div> 
               <div> 
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;"> MOT DE PASSE</label>
                    <div class="col-sm-10">
                    <input type="password" id="password1" maxlength="30" minlength="1"  name="pwd" placeholder="Mot de passe de l'utilisateurs" autocomplete="off" class="form-control placeholder-no-fix"required="" /><br>
                    <span style="position: absolute;right:21px;top:9px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
										</span>
                    <span style="position: absolute;right:21px;top:9px;" onclick="hideshow()" >
													
													<i id="eye" class="fa fa-eye"></i>
										</span>
                  </div>
              </div>
              </div>
              <div class="modal-footer">
                <button id="submit" name="envoi" class="btn btn-theme" type="submit">Enregistrer</button>
                <button data-dismiss="modal" class="btn btn-default" type="reset">annuler</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>

  <script>
      $("#submit").click(function(){
         var code = $("#code").val();
         var nom = $("#nom").val();
         var prenom = $("#prenom").val();
         var adresse = $("#adresse").val();
         var role = $("#role").val();
         var etat = $("#etat").val();

         if(code == '' || nom == '' || prenom == '' || adresse == '' || role == '' || etat ==''){

              swal({
                  title: "Invalide",
                  text: "Veuillez completer les champs!",
                  icon: "error",
                  button: "ok",
            });
         }else{
              swal({
                  title: "Good job!",
                  text: "Enregistrement reussi",
                  icon: "success",
                  button: "OK",
            });
         }
      });  
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
			}else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>
</body>
</html>