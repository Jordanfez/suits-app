<?php
// demarage de la session et enregistrement
 session_start();
 $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['envoiyer'])){
      if(!empty($_POST['numero_demande']) || !empty($_POST['numero_planning']) || !empty($_POST['code']) || !empty($_POST['date_demande']) || !empty($_POST['objet']) || !empty($_POST['reception']) || !empty($_POST['lieu_intervention']) || !empty($_POST['date_aller'])  || !empty($_POST['date_retour']) || !empty($_POST['prioriter']) || !empty($_POST['etat'])){
        $numero = htmlspecialchars($_POST['numero_demande']);
        $planning = htmlspecialchars($_POST['numero_planning']);
        $code = htmlspecialchars($_POST['code']);
        $demande = htmlspecialchars($_POST['date_demande']);
        $objet = htmlspecialchars($_POST['objet']);
        $reçu = htmlspecialchars($_POST['reception']);
        $lieu = htmlspecialchars($_POST['lieu_intervention']);
        $prevu = htmlspecialchars($_POST['date_aller']);
        $retour = htmlspecialchars($_POST['date_retour']);
        $priorite = htmlspecialchars($_POST['prioriter']);
        $etat = htmlspecialchars($_POST['etat']);
        $insertion = $bdd->prepare('INSERT INTO demande(numero_demande, numero_planning, code, date_demande, objet, reception, lieu_intervention, date_aller, date_retour, prioriter, etat) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertion->execute(array($numero, $planning, $code, $demande, $objet, $reçu, $lieu, $prevu, $retour, $priorite, $etat));

        $recupdemande =  $bdd->prepare('SELECT * FROM demande WHERE numero_demande = ? || numero_planning = ? || code = ? || date_demande = ? || objet = ? || reception = ? || lieu_intervention = ? || date_aller = ? || date_retour = ? || prioriter = ? || etat =?');
        $recupdemande->execute(array($numero, $planning, $code, $demande, $objet, $reçu, $lieu, $prevu, $retour, $priorite, $etat));
        if($recupdemande->rowCount() > 0){
          $_SESSION['numero_demande'] = $numero;
          $_SESSION['numero_planning'] = $planning;
          $_SESSION['code'] = $code;
          $_SESSION['date_demande'] = $demande;
          $_SESSION['objet'] = $objet;
          $_SESSION['reception'] = $reçu;
          $_SESSION['lieu_intervention'] = $lieu;
          $_SESSION['date_aller'] = $prevu;
          $_SESSION['date_retour'] = $retour;
          $_SESSION['prioriter'] = $priorite;
          $_SESSION['etat'] = $etat;
      // $_SESSION['id'] = $recupdemande->fecth()['id'];
        }
      //  echo $_SESSION['id'];

      }else{
        echo "veuillez rempire tout les chemps...";
      }
    }
  // enregistrement du traitement
   if(isset($_POST['envoiyer'])){

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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>demande intervention</title>

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
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<script src="sweetalert/sweetalert.min.js"></script> 
      <section id="main-content">
        <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Demande d'intervention</h3>
            <div class="form-panel">
              <form action="" class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="control-label col-md-3">Rempire le formulaire</label>
                  <div class="col-md-3 col-xs-11"style="width: 65%;padding-right:1%;">
                          <input id="demande" name="numero_demande" type="text" class="form-control" placeholder="Entrez le numero de la demande " required="" /><br>
                          <input id="planning" name="numero_planning" type="text" class="form-control" placeholder="Entrez le numero de planning" required="" /><br>
                          <input id="code" name="code" type="text" class="form-control" placeholder="Entrez le code du client" required="" /><br> 
                          <input id="date" name="date_demande" class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value=""  placeholder="Date de la demande"><br>
                          <textarea id="objet" name="objet" id="" cols="92" rows="2" class="form-control" placeholder="objet de la demande" required="" /></textarea><br><br>
                          <input id="reception" name="reception" type="text" class="form-control" placeholder="Demande reçue par..." required="" /><br>
                          <input id="lieu" name="lieu_intervention" type="text" class="form-control" placeholder="Entrez le lieux de lintervention" required="" /><br>
                          <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy"   >
                            <input id="aller" name="date_aller" type="text" class="form-control dpd1" name="from" placeholder="Date aller">
                            <span class="input-group-addon">To</span>
                            <input id="retour" name="date_retour" type="text" class="form-control dpd2" name="to" placeholder="Date retour">
                          </div>
                            <br>
                            <select id="prioriter" name="prioriter" class="form-control">
                              <option value="minimale">Minimale</option>
                              <option value="Maximale">Maximale</option>
                              <option value="Urgente">Urgente</option>
                            </select>
                    <span class="help-block">Selectionner l'option d'urgence</span>
                    <select id="etat" name="etat" class="form-control"><br>
                              <option value="on">on</option>
                    </select>
                  </div>
                </div>
                
                <div class="ln_solid">
						        <div class="form-group row">
							        <div class="col-md-9 col-sm-9  offset-md-3" style="text-align:center;">
                        <button id="sen" name="envoiyer" type="submit" class="btn btn-success">Enregistrer</button>
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

  <script>
      $("#sen").click(function(){
         var demande = $("#demande").val();
         var planning = $("#planning").val();
         var code = $("#code").val();
         var date = $("#date").val();
         var objet = $("#objet").val();
         var reception = $("#reception").val();
         var lieu = $("#lieu").val();
         var aller = $("#aller").val();
         var retour = $("#retour").val();
         var prioriter = $("#prioriter").val();
         var etat = $("#etat").val();

         if(demande == '' || planning == '' || code == '' || date == '' || objet == '' || reception == '' || lieu == '' || aller == '' || retour == '' || prioriter == '' || etat ==''){

              swal({
                  title: "Invalide",
                  text: "Veuillez completrer les champs!",
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
