<?php
  session_start();

  if(!empty($_SESSION["pwd"])){
    $identifiant = $_SESSION["pwd"] ;
    //die($identifiant) ;
  }
  else{
    header("location: index.php");
  }
?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport-width" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>suivi des interventions</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="responsive.css">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
   
<section id="container" style="">
<header class="header blue-bg"style="right: -3%; margin-left: -1.5%;">
   <div class="contact" style="background-color:#18b1c3; "><br>
        <p style="text-align: center; color: black;"><strong> SUIVI DES INTERVENTIONS</strong></p>
        <div class="maket">
          <img style="position: relative; color: black; right: -1%; margin-top: -4.5%;" src="../img/suits.png" alt="">
       </div>
    </div>
    </header>
  </section>

    <section id="container">
        <!-- **********************************************************************************************************************************************************
            TOP BAR CONTENT & NOTIFICATIONS
            *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg" style="  margin-top: 4%;">
          <!--logo start-->
          <!-- a class="logo"><b>INTER<span>VENTION</span></b></a -->
          <!--logo end-->
          <div class="nav notify-row" id="top_menu" style= "margin-left: 16%;">
            <!--  notification start -->
            <ul class="nav top-menu">
              <!-- settings start -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <b style="color: aliceblue;"> GESTION UTILISATEURS</b>
                  <span class="badge bg-theme"></span>
                  </a>
                <ul class="dropdown-menu extended tasks-bar">
                  <div class="notify-arrow notify-arrow-green"></div>
                  <li>
                    <p class="green">UTILISATEURS</p>
                  </li>
                  <li>
                    <a href="utilisateur.php">
                      <div class="task-info">
                        <div>CREER</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="utilisateurliste.php">
                      <div class="task-info">
                        <div>LISTE</div>
                      </div>
                    </a>
                  </li>
                  <li>
                </ul>
              </li>
              <!-- settings end -->
              <!-- inbox dropdown start-->
              <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                  <b style="color: aliceblue;">GESTION INTERVENTIONS</b>
                  </a>
                <ul class="dropdown-menu extended inbox">
                  <li>
                  <div class="notify-arrow notify-arrow-green"></div>
                    <p class="green">INTERVENTION</p>
                  </li>
                  <li>
                     <a href="listeinter.php">
                        <div class="task-info">
                            <div>LISTE INTERVENTION </div>
                        </div>
                     </a>
                  </li>
                  <li>
                     <a href="intervention.php">
                        <div class="task-info">
                            <div>ENREGISTRER UNE INTERVENTION</div>
                        </div>
                     </a>
                  </li>
                </ul>
              </li>
              <!-- inbox dropdown end -->
              <!-- notification dropdown start-->
              <!-- li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                  <b style="color: aliceblue;">GESTION DES DEMAMDES D'INTERVENTION</b>
                  <span class="badge bg-warning"></span>
                  </a>
                <ul class="dropdown-menu extended notification">
                  <div class="notify-arrow notify-arrow-yellow"></div>
                  <li>
                  <div class="notify-arrow notify-arrow-green"></div>
                    <p class="green"> DEMAMDE INTERVENTIONS</p>
                  </li>
                  <li>
                     <a href="listedemande.php">
                        <div class="task-info">
                            <div>LISTE DES DEMANDES</div>
                        </div>
                     </a>
                  </li>
                  <li>
                     <a href="demande_intervention.php">
                        <div class="task-info">
                            <div>ENREGISTREMENT <br> D'UNE DEMANDE</div>
                        </div>
                     </a>
                  </li>
                </ul>
              </li -->
              <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
          </div>
          <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login1.php">DECONNEXION</a></li>
        </ul>
      </div>
    </header>
      <!--footer end-->
      <aside >
      <div id="sidebar" class="nav-collapse " style="  margin-top: 7%;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>CLIENT</span>
              </a>
            <ul class="sub">
              <li><a href="enregistrementclient.php">enregistrement client</a></li>
              <li><a href="listeclient.php">liste</a></li>
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
            <a href="">
              <i class="fa fa-user"></i> <span>ADMINISTRATEUR</span></a>
              <ul class="sub">
              <li><a href="aministrateurs.php">ENREGISTRMENT</a></li>
              <li><a href="listeadministrateur.php">LISTE DES ADMINISTRATEURS</a></li>
              <li><a href="profiladmi.php">MON COMPTE</a></li>
            </ul>
            </a>
          </li>
          <!--li>
            <a href="">
              <i class=""></i> <span>PLANNING <br> D'INTERVENTION</span></a>
              <ul class="sub">
              <li><a href="planning.php">ENREGISTREMENT</a></li>
              <li><a href="listeplan.php">LISTE</a></li>
            </ul>
            </a>
          </li-->
          <li>
            <a href="">
              <i class="fa fa-book"></i> <span>HISTORIQUE</span></a>
              <ul class="sub">
              <!--li><a href="historique2.php">ENREGISTREMENT</a></li-->
              <li><a href="histo2.php">Choix de l'Historique</a></li>
            </ul>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
  
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
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
<section id="main-content">
  <section class="wrapper"  >
          <!-- Content Row -->
      <div class="row" style="  margin-top: 9%;">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"style="margin-left:4%;font-size: 13px;">
                                <p>  Nombre de client <br> present <br> dans l'entreprise </p></div>
                                <?php
                                    $con = mysql_connect("localhost", "root", "") or die(mysql_error());
                                    $bdd = mysql_select_db("lsdi") or die(mysql_error());
                                    $req = "SELECT COUNT(*) FROM client WHERE etat ='on'";
                                    $sq = mysql_query( $req, $con) or die(mysql_error());
                                    $resul = mysql_fetch_assoc($sq);
                                    
                               ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="margin-left:4%;font-size: 17px;">
                                        <div class="col-sm-10"><p><?php echo $resul["COUNT(*)"]-1; ?></p>
                                            <div  style="margin-left: -9%; ">client(s)</div>
                                        </div>
                                    </div> 
                                     
                            </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="margin-left:4%;font-size: 13px;">
                                 Nombre d'ntervention effectuee par <br> l'entreprise</div>
                                 <?php
                                    $req2 = "SELECT COUNT(*) FROM intervention WHERE etat ='on'";
                                    $sq2 = mysql_query( $req2, $con) or die(mysql_error());
                                    $resul2 = mysql_fetch_assoc($sq2);
                                    
                               ?>
                              <div class="h5 mb-0 font-weight-bold text-gray-800" style="margin-left:4%;font-size: 17px;">
                                <div class="col-sm-10"><p><?php echo $resul2["COUNT(*)"]-1; ?></p>
                                  <div  style="margin-left: -9%; ">Intervention(s)</div>
                                </div> 
                              
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="margin-left:4%;font-size: 13px;">
                                Nombre de technicien  <br> disponible <br> dans la structure
                              </div>
                              <?php
                                    $req3 = "SELECT COUNT(*) FROM techniciens WHERE etat ='on'";
                                    $sq3 = mysql_query( $req3, $con) or die(mysql_error());
                                    $resul3 = mysql_fetch_assoc($sq3);
                               ?>
                              <div class="h5 mb-0 font-weight-bold text-gray-800" style="margin-left:4%;font-size: 17px;">
                                <div class="col-sm-10" ><p><?php echo $resul3["COUNT(*)"]-1; ?></p>
                                <div style="margin-left: -9%; ">technicien(s)</div>
                                </div>  
                              
                             </div>
                          </div>
                          <div class="col-auto">
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="margin-left:4%;font-size: 13px;">
                                  Nombre d'utilisation <br> present <br> dans l'entreprise</div>
                                  <?php
                                    $req4 = "SELECT COUNT(*) FROM utilisateurs WHERE etat ='on'";
                                    $sq4 = mysql_query( $req4, $con) or die(mysql_error());
                                    $resul4 = mysql_fetch_assoc($sq4);
                               ?>
                              <div class="h5 mb-0 font-weight-bold text-gray-800" style="margin-left:4%;font-size: 17px;">
                                <div class="col-sm-10"><p><?php echo $resul4["COUNT(*)"]-1; ?></p>
                                <div  style="margin-left: -9%; ">utisateur(s)</div>
                                </div> 
                             
                              </div>
                          </div>
                          <div class="col-auto">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
</form>
<section class="wrapper"> 
<div class="row">
  <div class="col-md-15">
    <div class="panel panel-default articles">
      <div class="panel-heading">
      <h4 style="color: rgb(17, 122, 184);">liste des interventions recentes</h4> 
      <span class="pull-right clickable panel-toggle panel-button-tab-left"></span></div>
      <div class="panel-body articles-container">
        <div class="article border-bottom">

          <div class="col-xs-19">
            <div class="row">
            <div class="col-lg-19">
            <div class="form-panel">
             <div class="card-body">
              <div class="table-responsive">
               <table id="tableau" class="table table-striped table-bordered" style="font-size: 14px; text-align: center; " >
                <thead style="color: beige;text-align: center; background-color: rgb(0, 153, 255);" class="w3-blue">
                  <th>N°</th>
                  <th>statut</th>
                  <th>nom de l'intervention</th>
                  <th>date debut</th>
                  <th>date de fin</th>
                  <th>location</th>
                  <th>nom du client</th>
                  <th>nom du technicien</th>
              </thead>
          </div>
          </div>
        </div>
        <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT id, statut,nom, dates, fin, localisation, nom_client, nom_technicien FROM intervention  WHERE etat='on' AND statut = 'EN COURS' ORDER BY id ASC LIMIT 5" ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        $resultat = mysql_fetch_assoc($sql) ;
           $i = 1 ;
            while($resultat = mysql_fetch_assoc($sql)){
              ?>
               <tr>
                <td><?php echo $resultat["id"] ?> </td>
                <td><?php echo $resultat["statut"] ?></td>
                <td><?php echo $resultat["nom"] ?></td>
                <td><?php echo $resultat["dates"] ?></td>
                <td><?php echo $resultat["fin"] ?></td>
                <td><?php echo $resultat["localisation"] ?></td>
                <td><?php echo $resultat["nom_client"] ?></td>
                <td><?php echo $resultat["nom_technicien"] ?></td>
                </td>
                </tr>
    <?php
                $i++ ;
            }
    ?>
    </table>
            </div>
          </div>
          <div class="clear"></div>
        </div><!--End .article-->
 </section>

</body>
</html>