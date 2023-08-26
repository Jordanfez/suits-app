<?php
// code d'enregistrement
   session_start();
   $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
   if (isset($_POST['envoie'])){
    if(!empty($_POST['code']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['adresse']) || !empty($_POST['telephone']) || !empty($_POST['pwd']) || !empty($_POST['etat'])){
      $code = htmlspecialchars($_POST['code']);
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $adresse = htmlspecialchars($_POST['adresse']);
      $telephone = htmlspecialchars($_POST['telephone']);
      $pwd = htmlspecialchars($_POST['pwd']);
      $insertion = $bdd->prepare("INSERT INTO administrateurs(code, nom, prenom, adresse, telephone, pwd, etat)VALUES(?, ?, ?, ?, ?, ?, 'on')");
      $insertion->execute(array($code, $nom, $prenom, $adresse, $telephone, $pwd));
      header("location: aministrateurs.php ") ;
    }else{
      echo "veuillez rempire tout les chemps...";
    }
}
// enregistrement du traitement
   if(isset($_POST['envoie'])){
    /*
        $tache =  "ENREGISTREMENT";
        $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer  l'enregistrement de Mr/Mme"." ".$_SESSION['nom']." ";
        $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
        $insertion = $bdd->prepare("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
        $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
     
       */
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>enregistrement administrateur</title>

  <!-- Favicons -->
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

</head>
<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>ADMIN<span>ISTRATEUR</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse " style="margin-top: 3%;">
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
          <!--li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>DEMANDE D'INTERVENTION</span>
              </a>
            <ul class="sub">
              <li><a href="demande_intervention.php">AJOUTER</a></li>
              <li><a href="listedemande.php">LISTE</a></li>
            </ul>
          </li-->
         
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
              <li><a href="historique.php.php">RECHERCHER</a></li>
                <li><a href="listehistorique.php">LISTE DES INTERVENTION</a></li>
            </ul>
            </a>
          </li>
          <li>
            <a href="accueil1.php">
              <i class="fa fa-home"></i> Home<span></span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>    <!--header end-->
  </section>

    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> ENREGISTRMENT</h3>
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="lolo" action="" class="form-horizontal style-form" method="POST">
                <div class="form-group">
                <div class="col-md-14 col-xs-11"style="width: 85%;padding-right:1%;"> <br>  
                <div>
                    <label for=""  class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 70%;"><strong> CODE Administrateur</strong></label>              
                    <div class="col-sm-10" >
                      <input id="code" maxlength="25" minlength="1" name='code' type="text" class="form-control" placeholder="Entrez le code administrateur" autocomplete="off" required="" /><br>
                    </div>
                 </div>
                 <div>
                    <label class="col-sm-2 col-sm-2 control-label" for="" style="color :  black; opacity: 77%;"> NOM</label> 
                    <div class="col-sm-10" >
                       <input id="nom" maxlength="15" minlength="1" name='nom' type="text" class="form-control" placeholder="Nom administrateur" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> PRENOM </label>  
                    <div class="col-sm-10">
                      <input id="prenom" maxlength="15" minlength="1" name='prenom' type="text" class="form-control" placeholder="Prenom administrateur" autocomplete="off" required="" /><br>
                    </div>
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> ADRESSE </label> 
                    <div class="col-sm-10"> 
                       <input id="adresse" maxlength="25" minlength="1" name='adresse' type="email" class="form-control" data-rule="email"  data-msg="Please enter a valid email" placeholder="Adresse mail administrateur" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> NUMERO DE TELEPHONE</label> 
                    <div class="col-sm-10">
                     <input id="telephone" maxlength="12" minlength="1" name='telephone' type="text" class="form-control" placeholder="Numero de telephone" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
                  <div>
                    <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> NUMERO DE TELEPHONE</label> 
                    <div class="col-sm-10">
                     <input id="pwd"  name='pwd' type="password" maxlength="20" minlength="1" class="form-control" placeholder="Entrez le mot de passe" autocomplete="off" required="" /><br>
                    </div> 
                  </div>
                  </div>
               </div><br>
               <div class="ln_solid">
				          <div class="form-group row">
				           <div class="col-md-9 col-sm-9  offset-md-3" style="text-align:center;">
                      <button id="submit" name="envoie" type="submit" class="btn btn-success"> Enregistrer</button>
					            <button class="btn btn-primary" type="reset">annuler</button>	
				            </div>
				          </div>
                </div> 
             </form>
           </div>
          </div>
        </div>
      </section>
     </section>

 <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="sweetalert/sweetalert.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/php-mail-form/validate.js"></script>
  <script src="lib/advanced-form-components.js"></script>

  <script>
      $("#submit").click(function(){
         var code = $("#code").val();
         var nom = $("#nom").val();
         var prenom = $("#prenom").val();
         var adresse = $("#adresse").val();
         var telephone = $("#telephone").val();
         var pwd = $("#pwd").val();
         var etat = $("#etat").val();

         if(code == '' || nom == '' || prenom == '' || adresse == '' || telephone == '' || pwd == '' || etat ==''){

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