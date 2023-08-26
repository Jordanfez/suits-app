<?php

    session_start();
    $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['envoies'])){
        if(!empty($_POST['numero_intervention']) || !empty($_POST['matricule_technicien']) || !empty($_POST['code_client']) || !empty($_POST['numero_utilisateur']) || !empty($_POST['nature']) || !empty($_POST['dates']) || !empty($_POST['etat'])){
        $numero = htmlspecialchars($_POST['numero_intervention']);
        $matricule = htmlspecialchars($_POST['matricule_technicien']);
        $code = htmlspecialchars($_POST['code_client']);
        $utilisateur = htmlspecialchars($_POST['numero_utilisateur']);
        $nature = htmlspecialchars($_POST['nature']);
        $date = htmlspecialchars($_POST['dates']);
        $etat = htmlspecialchars($_POST['etat']);
        $insertion = $bdd->prepare('INSERT INTO historique(numero_intervention, matricule_technicien, code_client, numero_utilisateur, nature, dates, etat)VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insertion->execute(array($numero, $matricule, $code, $utilisateur, $nature, $date, $etat));

        $recuphist = $bdd->prepare('SELECT * FROM historique WHERE numero_intervention = ? || matricule_technicien = ? || code_client = ? || numero_utilisateur = ? || nature = ? || dates= ? || etat = ?');
        $recuphist->execute(array($numero, $matricule, $code, $utilisateur, $nature, $date, $etat));
        if($recuphist->rowCount() > 0){
                $_SESSION['numero_intervention'] = $numero;
                $_SESSION['matricule_technicien'] = $matricule;
                $_SESSION['code_client'] = $code;
                $_SESSION['numero_utilisateur'] = $utilisateur;
                $_SESSION['nature'] = $nature;
                $_SESSION['dates'] = $date;
                $_SESSION['etat'] = $etat;
                // $_SESSION['id'] = $recuphist->fecth()['id'];
        }
            // echo $_SESSION['id'];
       }else{
            echo 'entrez des données exactes';
        }
    }
    // enregistrement du traitement
   if(isset($_POST['envoies'])){

    $tache =  "ENREGISTREMENT";
    $description = "Mr/Mme"." ".$_SESSION['login']." a enregistrer une historique  ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion = $bdd->prepare("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
    $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
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
            <a>
              <i class="fa fa-desktop"></i>
              <span>CLIENT</span>
              </a>
            <ul class="sub">
              <li><a href="liste.php">liste</a></li>
              <li><a href="enregistrementclient.php">enregistrement client</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a>
              <i class="fa fa-cogs"></i>
              <span>DEMANDE D'INTERVENTION</span>
              </a>
            <ul class="sub">
              <li><a href="demande_intervention.php">AJOUTER</a></li>
              <li><a href="liste.php">LISTE</a></li>

            </ul>
          </li>
          <li class="sub-menu">
            <a>
              <i class="fa fa-book"></i>
              <span>UTILISATEUR</span>
              </a>
            <ul class="sub">
                <li><a href="utilisateurs.php">AJOUTER</a></li>
                <li><a href="liste.php">LISTE</a></li>

            </ul>
          </li>
          <li class="sub-menu">
            <a>
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
            <li>
            <a href="accueil1.php">
              <i class="fa fa-home"></i> <span>HOME</span></a>
            </ul>
            </a>
          </li>
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
        <h3><i class="fa fa-angle-right"></i> Enregistrer une historique</h3>
          <!--  DATE PICKERS -->
          <div class="col-lg-10">
            <div class="form-panel">
              <form action="" class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="control-label col-md-3">Enregistrer une historique</label>
                  <div class="col-md-3 col-xs-11"style="width: 65%;padding-right:1%;">
                   <input id="numero" name="numero_intervention" type="text" class="form-control" placeholder="Entrez le numero de l'intervention" required="" /><br>
                   <input id="matricule" name="matricule_technicien" type="text" class="form-control" placeholder="Matricule du technicien" required="" /><br>
                   <input id="code" name="code_client" type="text" class="form-control" placeholder="Entrez le code du client" required="" /><br>
                   <input id="num" name="numero_utilisateur" type="text" class="form-control" placeholder="Entrez le numero de l'utilisateur" required="" /><br>
                   <input id="nature" name="nature" type="text" class="form-control" placeholder="Nature de l'intervention" required="" /><br>
                   <div class="" data-date="01/01/2014" data-date-format="mm/dd/yyyy"   >
                            <input id="date" name="dates" type="text" class="form-control" name="from" placeholder="Date de l'intervention" required="" />
                    </div><br>
                   
                   <select id="etat" name="etat" class="form-control"><br>
                              <option value="on">on</option>
                    </select><br>
                   <div class="ln_solid">
                   <div class="form-group row">
							       <div class="col-md-9 col-sm-9  offset-md-3" style="text-align:center;">
                        <button id="send" name="envoies" type="submit" class="btn btn-success"> Enregistrer</button>
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
  <script src="sweetalert/sweetalert.min.js"></script>
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
         var matricule = $("#matricule").val();
         var code = $("#code").val();
         var num = $("#num").val();
         var nature = $("#nature").val();
         var date = $("#date").val();
         var etat = $("#etat").val();

         if(numero == '' || matricule == '' || code == '' || num == '' || nature == '' || date == '' || etat ==''){

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