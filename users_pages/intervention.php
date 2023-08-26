<?php

    session_start();

    if (isset($_POST['envoi'])){
      if(!empty ($_POST['code']) || ($_POST['nom']) || !empty($_POST['localisation']) || !empty($_POST['dates']) || !empty($_POST['statut']) || !empty($_POST['fin']) || !empty($_POST['descriptions']) || !empty($_POST['nom1']) || !empty($_POST['nom_technicien']) ){
        $code = htmlspecialchars($_POST['nom']);
        $nom = htmlspecialchars($_POST['nom']);
        $local = htmlspecialchars($_POST['localisation']);
        $date = htmlspecialchars($_POST['dates']);
        $prenom = htmlspecialchars($_POST['statut']);
        $telephone = htmlspecialchars($_POST['fin']);
        $fax = htmlspecialchars($_POST['descriptions']);
        $fax1 = htmlspecialchars($_POST['nom1']);
        $email = htmlspecialchars($_POST['nom_technicien']);
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = "INSERT INTO intervention(code, nom, localisation, dates, statut, fin, descriptions,nom_client, nom_technicien, etat) VALUES('$code', '$nom', '$local', '$date', '$prenom', '$telephone', '$fax', '$fax1', '$email','on') " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        header("location: intervention.php ") ;
      }else{
        echo "veuillez compltez les champs...";
    }
  }

  if (isset($_POST['envoi'])){
    if(!empty($_POST['nom']) || !empty($_POST['localisation']) || !empty($_POST['dates']) || !empty($_POST['statut']) || !empty($_POST['fin']) || !empty($_POST['descriptions']) || !empty($_POST['nom1']) || !empty($_POST['nom_technicien']) ){

      $code = htmlspecialchars($_POST['nom']);
      $local = htmlspecialchars($_POST['localisation']);
      $nom = htmlspecialchars($_POST['dates']);
      $prenom = htmlspecialchars($_POST['statut']);
      $telephone = htmlspecialchars($_POST['fin']);
      $fax = htmlspecialchars($_POST['descriptions']);
      $fax1 = htmlspecialchars($_POST['nom1']);
      $email = htmlspecialchars($_POST['nom_technicien']);
      $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
      $db = mysql_select_db("lsdi") or die(mysql_error()) ;
      $requete2 = "INSERT INTO historique(nom,localisation, dates, statut, fin, descriptions,nom_client, nom_technicien) VALUES('$code', '$local', '$nom', '$prenom', '$telephone', '$fax', '$fax1', '$email','NULL','NULL','NULL') " ;
      $sql = mysql_query($requete2, $con) or die(mysql_error()) ;
    }
  }

      // enregistrement du traitement
    if(isset($_POST['envoi'])){

      $tache =  "ENREGISTREMENT";
      $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer  l'enregistrement de Mr/Mme"." ".$_SESSION['nom']." ";
      $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
      $insertion = $bdd->prepare("INSERT INTO historique (type_traitement, descriptions_tache, dates_operation) VALUES('NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',$tache','$description','$date')");
      $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
    }

   require_once 'main.php';
   $sq = "SELECT nom FROM techniciens";

   try{
     $stmt=$bdd->prepare($sq);
     $stmt->execute();
     $results=$stmt->fetchAll();
   }
   catch(Exception $ex){
     echo ($ex -> getMessage());
   }

   $sq1 = "SELECT nom_client FROM client";

   try{
     $stmt1 = $bdd->prepare($sq1);
     $stmt1->execute();
     $results1 =$stmt1->fetchAll();
   }
   catch(Exception $ex){
     echo ($ex -> getMessage());
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
  
  <link rel="stylesheet" href="w3.css">
  <title>suivi des interventions</title>

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
  
  <link rel="stylesheet" href="css/to-do.css">
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
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>INTER<span>VENTION</span></b></a>
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
                <li><a href="listehistorique.php">LISTE DES INTERVENTION</a></li>
            </ul>
            </a>
          </li>
          <li>
            <a href="accueil.php">
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
        <h3><i class="fa fa-angle-right"></i> enregistrement d'une intervention</h3>
          <!--  DATE PICKERS -->
          <div class="col-lg-11">
            <div class="form-panel">
              <form action="" class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <div class="col-md-3 col-xs-11"style="width: 65%;padding-right:1%;"><br>     
     </div>  
  </div> 
         <div class="">
              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">code de l'intervention</label>
              <div class="col-sm-10">
                <input id="code" maxlength="15" minlength="1" name="code" type="select" class="form-control" placeholder="Entrez le code de l'intervention " autocomplete="off" required="" /><br>
              </div>
        </div>
          <div class="">
              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Motif de l'intervention</label>
              <div class="col-sm-10">
                <input id="numero" maxlength="30" minlength="1" name="nom" type="select" class="form-control" placeholder="Entrez le motif de l'intervention " autocomplete="off" required="" /><br>
              </div>
        </div>
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">localisation</label>
            <div class="col-sm-10">
              <input id="date" maxlength="25" minlength="1" name="localisation" type="text" class="form-control" placeholder="Entrer la localisation"autocomplete="off" required="" /><br>
              </div>
        </div>
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Date debut de l'intervention</label>
            <div class="col-sm-10">
              <input id="date" name="dates" type="date" class="form-control" placeholder="Date debut de  l'intervention"autocomplete="off" required="" /><br>
              </div>
        </div> 
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Statut de l'intervention</label>
            <div class="col-sm-10">
                <select id="nature" name="statut" class="form-control">
                    <option style="color : rgba(127, 255, 133, 0.774);" value="EN COURS">EN COURS</option>
                    <option style="color : red;" value="ACHEVER">ACHEVER</option>
                    <option style="color : rgb(236, 214, 14);" value="ANNULER">ANNULER</option>
                  </select>  <br>
            </div>
        </div> 
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Entrez la date de fin </label>
              <div class="col-sm-10">
                  <input id="durer" type="date" name="fin" class="form-control" placeholder="Entrez la date de fin de l'intervention " autocomplete="off" required="" /><br>
            </div>
        </div>   
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">DESCRIPTION</label>
            <div class="col-sm-10">
                <textarea id="opo"maxlength="2225" minlength="1" name="descriptions" id="" cols="92" rows="1" class="form-control" placeholder="Saisir la description de l'intervention " autocomplete="off" required="" /></textarea><br>
            </div>
        </div> 
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">client</label>
              <div class="col-sm-10">
              <select class="form-control" name="nom1" id="nom1">
                    <option value=""> CHOISIR UN CLIENT</option>
                    <?php  foreach ($results1 as $output) {?>
                      <option value="<?php  echo $output["nom_client"]; ?>"> <?php  echo $output["nom_client"]; ?> </option>
                      <?php  }?>
                  </select><br>
                </div>
        </div>  
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Technicien</label>
              <div class="col-sm-10">
              <select class="form-control" name="nom_technicien" id="nom_technicien">
                    <option value=""> CHOISIR UN NOM  DE LA LISTE DE TECHNICIEN </option>
                    <?php  foreach ($results as $output) {?>
                      <option value="<?php  echo $output["nom"]; ?>"> <?php  echo $output["nom"]; ?> </option>
                      <?php  }?>
                  </select><br>
                </div>
        </div> 
        <div class="">
            <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;"></label>
              <div class="col-sm-10">
                    <br>
              </div>
        </div>
        <div class="ln_solid">
          <div class="form-group row">
            <div class="modal-footer" style="float: right">
            <nav style="text-align:center;">
              <input  id="send" type="submit" name="envoi" class="btn btn-success" value="enregistrer">
                          
               <button class="btn btn-primary" type="reset">annuler</button>	
                </nav>
              </div>
            </div>
        </div>  
</form>
</section>
         
 
  <script src="sweetalert/sweetalert.min.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
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
  <script src="lib/advanced-form-components.js"></script>

  <script>
      $("#send").click(function(){
         var numero = $("#numero").val();
         var date = $("#date").val();
         var nature = $("#nature").val();
         var durer = $("#telephone").val();
         var opo = $("#opo").val();
         var matricule = $("#matricule").val();
         var etat = $("#etat").val();

         if(code == '' || numero == '' || date == '' || nature == '' || durer == '' || opo == '' || matricule == '' || etat ==''){

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
