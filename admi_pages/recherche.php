<?php

    session_start();
    $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['envoie'])){
        if(!empty($_POST['numero_intervention']) || !empty($_POST['matricule_technicien']) || !empty($_POST['rapport']) || !empty($_POST['types']) || !empty($_POST['numero_utilisateur'])){
           $numero = htmlspecialchars($_POST['numero_intervention']);
           $matricule = htmlspecialchars($_POST['matricule_technicien']);
           $rapport = htmlspecialchars($_POST['rapport']);
           $type = htmlspecialchars($_POST['types']);
           $utilisateur = htmlspecialchars($_POST['numero_utilisateur']);
           $insertion = $bdd->prepare('INSERT INTO historique(numero_intervention, matricule_technicien, rapport, types, numero_utilisateur)VALUES(?, ?, ?, ?, ?)');
           $insertion->execute(array($numero, $matricule, $rapport, $type, $utilisateur));

           $recuphist = $bdd->prepare('SELECT * FROM historique WHERE numero_intervention = ? || matricule_technicien = ? || rapport = ? || types = ? || numero_utilisateur = ?');
           $recuphist->execute(array($numero, $matricule, $rapport, $type, $utilisateur));
           if($recuphist->rowCount() > 0){
               $_SESSION['numero_intervention'] = $numero;
               $_SESSION['matricule_technicien'] = $matricule;
               $_SESSION['rapport'] = $rapport;
               $_SESSION['types'] = $type;
               $_SESSION['numero_utilisateur'] = $numero;
              // $_SESSION['id'] = $recuphist->fecth()['id'];
           }
          // echo $_SESSION['id'];
        }else{
         echo 'entrez des données exactes';
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
  <script src="lib/chart-master/Chart.js"></script>

</head>
<body>
<section id="container">
        <!-- **********************************************************************************************************************************************************
            TOP BAR CONTENT & NOTIFICATIONS
            *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg" style="right: 1%; position: relative; margin-top: -0.7%;">
          <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="REDUIRE"></div>
            </div>
          <!--logo start-->
          <!-- a class="logo"><b>INTER<span>VENTION</span></b></a -->
          <!--logo end-->                   
        </div>
        <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">DECONNEXION</a></li>
        </ul>
      </div>    
        </header>

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
              <li><a href="enregistrementclient.php">gestion des clients</a></li>
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
              <li><a href="modifier.html">MODIFIER ET SUPPRIMER</a></li>

            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>UTILISATEUR</span>
              </a>
            <ul class="sub">
                <li><a href="utilisateurs.php">AJOUTER</a></li>
                <li><a href="liste.php">LISTE</a></li>
                <li><a href="modifier.html">MODIFIER ET SUPPRIMER</a></li>

            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>TECHNICIEN</span>
              </a>
            <ul class="sub">
                <li><a href="technicien.php">AJOUTER</a></li>
                <li><a href="liste.php">LISTE</a></li>
                <li><a href="modifier.html">MODIFIER ET SUPPRIMER</a></li>
            </ul>
          </li>
         
          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
              <ul class="sub">
              <li><a href="mapsgoogle.php">RECHERCHER</a></li>
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
                <li><a href="liste.php">MODIFIER ET SUPPRIMER</a></li>
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
    </aside>

    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> HISTORIQUE</h3>
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="" class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="control-label col-md-3">Rechercher une historique</label>
                  <div class="col-md-3 col-xs-11"style="width: 65%;padding-right:1%;">
                    <input name="numero_intervention" type="text" class="form-control" placeholder="Entrez le numero de l'intervention" required="" /><br>
                    <input name="matricule_technicien" type="text" class="form-control" placeholder="Matricule du technicien" required="" /><br>
                    <input name="rapport" type="text" class="form-control" placeholder="Entrez le nom du rapport de l'intervention" required="" /><br>
                    
                    <div class="ln_solid">
                     <div class="form-group row">
                       <div class="col-md-9 col-sm-9  offset-md-3" style="text-align:center;">
                         <button name="" type="submit" class="btn btn-success"> Rechercher</button>
                          <button class="btn btn-primary" type="reset">annuler</button>	
				                </div>
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
</body>
</html>