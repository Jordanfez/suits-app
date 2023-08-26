<?php
// code d'enregistrement
   session_start();

   if (isset($_POST['enregistrer'])){
    if(isset($_POST['code']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['telephone']) || !empty($_POST['fax']) || !empty($_POST['email']) || !empty($_POST['compa']) || !empty($_POST['local'])){
      $code = htmlspecialchars($_POST['code']);
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $tel = htmlspecialchars($_POST['telephone']);
      $fax = htmlspecialchars($_POST['fax']);
      $email = htmlspecialchars($_POST['email']);
      $email = strtolower($email);
      $compa = htmlspecialchars($_POST['compa']);
      $local = htmlspecialchars($_POST['local']);
      $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
      $db = mysql_select_db("lsdi") or die(mysql_error()) ;
      $requete = " INSERT INTO client(code, nom_client, prenom, telephone, fax, email, compagnie, localisation, etat) VALUES('$code', '$nom', '$prenom', '$tel', '$fax', '$email','$compa','$local', 'on') " ;
      $sql = mysql_query($requete, $con) or die(mysql_error()) ;
      header("location: enregistrementclient.php ") ;
    }else{
      echo "veuillez rempire tout les chemps...";
    }
}
// enregistrement du traitement
   if(isset($_POST['enregistrer'])){

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
  <meta name="viewport-width" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>ENTREGISTREMENT CLIENT</title>

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

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <!--logo start-->
      <a href="index.html" class="logo"><b>CLI<span>ENT</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>CLIENT</span>
              </a>
            <ul class="sub">
              <li><a href="listeclient.php">liste</a></li>
              <li><a href="enregistrementclient.php">enregistrement client</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>DEMANDE D'INTERVENTION</span>
              </a>
            <ul class="sub">
              <li><a href="demande_intervention.php">AJOUTER</a></li>
              <li><a href="listedemande.php">LISTE</a></li>
            </ul>
          </li>
         
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>TECHNICIEN</span>
              </a>
            <ul class="sub">
                <li><a href="technicien.php">AJOUTER</a></li>
                <li><a href="listetech.php">LISTE</a></li>
            </ul>
          </li>
          <li>
            <a  href="">
              <i class="fa fa-comments-o"></i>
              <span>INTERVENTION</span>
              </a>
              <ul class="sub">
              <li><a href="intervention.php">ENREGISTRMENT</a></li>
                <li><a href="listeinter.php">LISTE</a></li>
            </ul>
          </li>
          <li>
            <a href="">
              <i class="fa fa-bar-chart-o"></i> <span>HISTORIQUE</span></a>
              <ul class="sub">
              <li><a href="historique.php">RECHERCHER</a></li>
                <li><a href="listehistorique.php">LISTE DES INTERVENTION</a></li>
            </ul>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>    <!--header end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <script src="sweetalert/sweetalert.min.js"></script>
<!--section du formulaire -->
  <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>ENTREGISTREMENT D'UN CLIENT</h3>
        <div class="col-lg-11">
            <div class="form-panel">
              <form class="client" method="POST" action="" style="position: static;" >
                <div class="form-group">
                  <div class="col-md-14 col-xs-11"style="width: 85%;padding-right:1%;"> <br>  

                  <div>
                    <label for=""  class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;"><strong> CODE CLIENT</strong></label>              
                    <div class="col-sm-10" >
                      <input id="code" maxlength="15" minlength="1" name='code' type="text" class="form-control" placeholder="Entrez le code client" autocomplete="off" required="" /><br>
                    </div>
                 </div>
                 <div>
                    <label class="col-sm-2 col-sm-2 control-label" for="" style="color :  black; opacity: 77%;"> NOM CLIENT</label> 
                    <div class="col-sm-10" >
                       <input id="nom" maxlength="15" minlength="1" name='nom' type="text" class="form-control" placeholder="Entrez le nom du client" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> PRENOM CLIENT</label>  
                    <div class="col-sm-10">
                      <input id="prenom" maxlength="15" minlength="1" name='prenom' type="text" class="form-control" placeholder="Entrez le prénom du client" autocomplete="off" required="" /><br>
                    </div>
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> NUMERO DE TELEPHONE</label> 
                    <div class="col-sm-10">
                     <input id="telephone" maxlength="12" minlength="1" name='telephone' type="text" class="form-control" placeholder="Téléphone du client" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> FAX CLIENT</label> 
                    <div class="col-sm-10" > 
                      <textarea id = "client" maxlength="60" minlength="1" name="fax" id="" cols="92" rows="1" class="form-control" placeholder="description du client" autocomplete="off" required="" /></textarea><br>
                    </div>
                  </div>
                 <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> ADRESSE </label> 
                    <div class="col-sm-10"> 
                       <input id="email" maxlength="25" minlength="1" name='email' type="text" class="form-control" placeholder="Email du client" autocomplete="off" required="" /><br>
                    </div> 
                  </div> 
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> compagnie </label> 
                    <div class="col-sm-10"> 
                       <input id="compa" maxlength="25" minlength="1" name='compa' type="text" class="form-control" placeholder="Compagnie du client" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> Locatisation </label> 
                    <div class="col-sm-10"> 
                       <input id="local" maxlength="30" minlength="1" name='local' type="text" class="form-control" placeholder="Localisation du client" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
            </div>
          </div>   
						    <div class="form-group row">
							    <div class="modal-footer" style="float: left; margin-left: 66%;">
                      <button id="submit" name='enregistrer' type="submit" class="btn btn-success"> Enregistrer</button>
								      <button class="btn btn-primary" type="reset">annuler</button>	
							      </div>
						    </div>
            </form>
      </div>
            <!--script page du swithalert(boite de dialogue confirm)-->
  <script>
      $("#submit").click(function(){
         var code = $("#code").val();
         var nom = $("#nom").val();
         var prenom = $("#prenom").val();
         var telephone = $("#telephone").val();
         var client = $("#client").val();
         var email = $("#email").val();
         var etat = $("#etat").val();

         if(code == '' || nom == '' || prenom == '' || telephone == '' || client == '' || email == '' || etat ==''){

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
</body>
</html>
