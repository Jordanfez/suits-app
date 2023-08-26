<?php

    session_start();
    // autre
    if (isset($_POST['envoi'])){
      if(!empty($_POST['matricule']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['statut']) || !empty($_POST['naissance']) || !empty($_POST['entrer'])  || !empty($_POST['adresse'])){
        $code = htmlspecialchars($_POST['matricule']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $telephone = htmlspecialchars($_POST['statut']);
        $naissance = htmlspecialchars($_POST['naissance']);
        $entrer = htmlspecialchars($_POST['entrer']);
        $fax = htmlspecialchars($_POST['adresse']);
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " INSERT INTO techniciens(matricule, nom, prenom, specialiter, dates_naissance, dates_entrer, adresse, etat_service, etat) VALUES('$code','$nom', '$prenom', '$telephone', '$naissance','$entrer', '$fax','oui', 'on') " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        header("location: technicien.php ") ;
      }else{
        echo "veuillez compltez les champs...";
    }
  }

  // enregistrement du traitement
if(isset($_POST['envoi'])){

$tache =  "ENREGISTREMENT";
$description = "Mr/Mme"." ".$_SESSION['login']." a effectuer  l'enregistrement de Mr/Mme"." ".$_SESSION['nom']." ";
$date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
$con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
$db = mysql_select_db("lsdi") or die(mysql_error()) ;
$insertion = ("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
$sql1 = mysql_query($insertion, $con) or die(mysql_error()) ;
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
  <title>Enregistrement d'un techniciens</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datetimepicker/datertimepicker.css" />
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
      <a href="index.html" class="logo"><b>TECH<span>NICIEN</span></b></a>      <!--logo end-->
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
              <li><a href="historique.php">RECHERCHER</a></li>
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
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
   
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Enregistrement D'un Technicien</h3>
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form action=""  class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <div class="col-md-3 col-xs-11" style="width: 85%;padding-right:1%;"><br>
                  <div>
                      <label for="mat" class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">  Matricule technicien</label>
                      <div class="col-sm-10">
                        <input id="matricule" maxlength="25" minlength="1" name="matricule" type="text" class="form-control" placeholder="Entrez le matricule du technicien" autocomplete="off" required="" /><br>
                      </div>
                  </div>
                  <div >
                      <label class="col-sm-2 col-sm-2 control-label" for="name" style=" color: black; opacity: 77%;">  Nom du technicein</label>
                      <div class="col-sm-10">
                       <input id="name" name="nom" maxlength="30" minlength="1" type="text" class="form-control" placeholder="Entrez le nom du technicien" autocomplete="off" required="" /><br>
                      </div>
                    </div>
                   <div>
                      <label class="col-sm-2 col-sm-2 control-label"  for="pre" style=" color: black; opacity: 77%;">  Prenom</label>
                      <div class="col-sm-10">
                         <input id="last" name="prenom" maxlength="30" minlength="1" type="text" class="form-control" placeholder="Entrez le Prénom du technicien" autocomplete="off" required="" /><br>
                      </div>
                    </div>
                   <div>
                      <label class="col-sm-2 col-sm-2 control-label"  for="sta" style=" color: black; opacity: 77%;"> Specialiter</label>
                      <div class="col-sm-10" >
                        <input id="statut" name="statut"  type="text" class="form-control" placeholder="Specialiter" autocomplete="off" required="" /><br>
                      </div>
                    </div>
                    <div>
                      <label class="col-sm-2 col-sm-2 control-label"  for="date" style=" color: black; opacity: 77%;"> date de naissance</label>
                      <div class="col-sm-10" >
                        <input id="statut" name="naissance" data-rule="email"  data-msg="Please enter a valid email"  type="date" class="form-control" placeholder="date de naissance" autocomplete="off" required="" /><br>
                      </div>
                    </div>
                    <div>
                      <label class="col-sm-2 col-sm-2 control-label"  for="entre" style=" color: black; opacity: 77%;"> date d'entrer service</label>
                      <div class="col-sm-10" >
                        <input id="statut" name="entrer"  type="date" class="form-control" placeholder="date d'entrer service" autocomplete="off" required="" /><br>
                      </div>
                    </div>
                   <div>
                      <label class="col-sm-2 col-sm-2 control-label" for="ad" style=" color: black; opacity: 77%;">  Adresse mail </label>
                      <div class="col-sm-10">
                         <input id="adresse"  name="adresse" type="email" class="form-control" placeholder="Adresse" autocomplete="off" required="" /><br>
                      </div>
                    </div> <br>
                   <div class="ln_solid">
                   <div class="form-group row" >
							       <div class="modal-footer" style="float: right">
                        <button id="envoi" name="envoi" type="submit" class="btn btn-success"> Enregistrer</button>
								        <button class="btn btn-primary" type="reset">annuler</button>	
							       </div>
					         </div>
            	   </div>  
               </div> 
             </form>
           </div>
         </div>
        </div> 
     

     </section>    
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
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>
  <script src="sweetalert/sweetalert.min.js"></script>

  <script>
      $("#envoi").click(function(){
         var matricule= $("#matricule").val();
         var name = $("#name").val();
         var last = $("#last").val();
         var statut = $("#statut").val();
         var adresse = $("#adress").val();
         var etat = $("#etat").val();

         if(matricule == '' || name == '' || last == '' || statut == '' || adresse == '' ||  etat ==''){

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