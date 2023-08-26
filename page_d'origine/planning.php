<?php

 session_start();
 $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['envoiyer'])){
      if(!empty($_POST['numero_planning']) || !empty($_POST['objectif']) || !empty($_POST['description']) || !empty($_POST['ressource']) || !empty($_POST['dates']) || !empty($_POST['durees']) || !empty($_POST['etat'])){
        $planing = htmlspecialchars($_POST['numero_planning']);
        $objetif = htmlspecialchars($_POST['objectif']);
        $description = htmlspecialchars($_POST['description']);
        $ressource = htmlspecialchars($_POST['ressource']);
        $dates = htmlspecialchars($_POST['dates']);
        $durees = htmlspecialchars($_POST['durees']);
        $etat = htmlspecialchars($_POST['etat']);
        $insertion = $bdd->prepare('INSERT INTO planning(numero_planning, objectif, description, ressource, dates, durees, etat) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insertion->execute(array($planing, $objetif, $description, $ressource, $dates, $durees, $etat));

        $recupdemande =  $bdd->prepare('SELECT * FROM planning WHERE  numero_planning = ? || objectif = ? || description = ? || ressource = ? || dates = ? || durees = ? || etat =?');
        $recupdemande->execute(array($planing, $objetif, $description, $ressource, $dates, $durees,  $etat));
        if($recupdemande->rowCount() > 0){
          $_SESSION['numero_planning'] = $planing;
          $_SESSION['objectif'] = $objetif;
          $_SESSION['description'] = $description;
          $_SESSION['ressource'] = $ressource;
          $_SESSION['dates'] = $dates;
          $_SESSION['durees'] = $durees;
          $_SESSION['etat'] = $etat;
      // $_SESSION['id'] = $recupdemande->fecth()['id'];
        }
      //  echo $_SESSION['id'];

      }else{
        echo "veuillez rempire tout les chemps...";
      }
    }

    if (isset($_POST['envoiyer'])){
      if(!empty($_POST['numero_planning']) || !empty($_POST['objectif']) || !empty($_POST['description']) || !empty($_POST['ressource']) || !empty($_POST['dates']) || !empty($_POST['durees'])){
        $planing = htmlspecialchars($_POST['numero_planning']);
        $objetif = htmlspecialchars($_POST['objectif']);
        $description = htmlspecialchars($_POST['description']);
        $ressource = htmlspecialchars($_POST['ressource']);
        $dates = htmlspecialchars($_POST['dates']);
        $durees = htmlspecialchars($_POST['durees']);
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " INSERT INTO planning(numero_planning, objectif, description, ressource, dates, durees, etat) VALUES('$planing', '$objetif', '$description', '$ressource', '$dates', '$durees', 'on') " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        header("location: planning.php ") ;
      }else{
        echo "veuillez rempire tout les chemps...";
      }
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
  <title>Dashio - Bootstrap Admin Template</title>

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
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
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
              <li><a href="liste.php">liste</a></li>
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
              <li><a href="liste.php">LISTE</a></li>

            </ul>
          </li>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>TECHNICIEN</span>
              </a>
            <ul class="sub">
                <li><a href="technicien.php">AJOUTER</a></li>
                <li><a href="liste.php">LISTE</a></li>
            </ul>
          </li>
          <li>
            <a  href="">
              <i class="fa fa-comments-o"></i>
              <span>INTERVENTION</span>
              </a>
              <ul class="sub">
              <li><a href="intervention.php">ENREGISTRMENT</a></li>
                <li><a href="liste.php">LISTE</a></li>
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
        <h3><i class="fa fa-angle-right"></i> Etablissement de planning</h3>
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="" class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="control-label col-md-3">Rempire le formulaire</label>
                  <div class="col-md-3 col-xs-11"style="width: 65%;padding-right:1%;">
                     <div>
                          <label class="col-sm-2 col-sm-2 control-label"  for=""> numero de planning</label>
                        <div class="col-sm-10">
                          <input id="numero" name="numero_planning" type="text" class="form-control" placeholder="Entrez le numero de planning" required="" /><br>
                          </div>
                     </div>
                     <div>
                        <label class="col-sm-2 col-sm-2 control-label" for="">objectif de  l'intervention</label>
                        <div class="col-sm-10">
                          <textarea id="opo" name="objectif" id="" cols="92" rows="1" class="form-control" placeholder="   Entrez l' objectif de  l'intervention"></textarea><br>
                        </div> 
                      </div> 
                      <div>
                        <label class="col-sm-2 col-sm-2 control-label" for="">Description</label>
                        <div class="col-sm-10">
                          <textarea id="description" name="description" id="" cols="92" rows="1" class="form-control" placeholder="Description des travaux  a effectuer"></textarea><br>
                        </div>
                      </div>
                      <div>
                        <label class="col-sm-2 col-sm-2 control-label" for="">Ressources</label>
                        <div class="col-sm-10">
                          <textarea id="ressource" name="ressource" id="" cols="92" rows="1" class="form-control" placeholder="Ressources requise"></textarea><br> 
                        </div>
                      </div>
                      <div>
                        <label class="col-sm-2 col-sm-2 control-label" for="">dates debut</label>
                        <div class="col-sm-10">
                          <input id="date" name="dates" class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value=""  placeholder="dates de debut des trataux"> <br>
                        </div>
                      </div>
                      <div> 
                        <label class="col-sm-2 col-sm-2 control-label"  for="">Durée</label>
                         <div class="col-sm-10">
                           <input id="durer" name="durees" type="text" class="form-control" placeholder="Durée des travaux" required="" />
                         </div>
                      </div>
                      <br>
                  </div>
                </div>
                
                <div class="ln_solid">
				    <div class="form-group row">
				      <div class="col-md-9 col-sm-9  offset-md-3" style="text-align:center;">
                    <button id="submit" name="envoiyer" type="submit" class="btn btn-success">Enregistrer</button>
						        <button class="btn btn-primary" type="reset">annuler</button>	
				        </div>
					</div>
            	</div>  
             </form>
           </div>
          </div>
       </div>

  
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
      $("#submit").click(function(){
         var numero = $("#numero").val();
         var opo = $("#opo").val();
         var description = $("#description").val();
         var ressource = $("#ressource").val();
         var date = $("#date").val();
         var durer = $("#durer").val();
         var etat = $("#etat").val();

         if(numero == '' || opo == '' || description == '' || ressource == '' || date == '' || durer == '' || etat ==''){

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
