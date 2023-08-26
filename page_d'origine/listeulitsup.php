<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="w3.css">
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
  <link rel="stylesheet" href="Modal/css/style1.css">
  <script src="Modal/js/modal1.js"></script>
    <title>liste</title>
    <script>
        .tr{
            margin: 10px;
        }
    </script>
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
      <a href="index.html" class="logo"><b>CLIENT<span>  SUPPRIMER</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse " style="margin-top: 2%;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          </li>
          <li class="sub-menu">
            <a href="clientsup.php">
              <i class="fa fa-desktop"></i>
              <span>CLIENT SUPPRIMER</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="listedemandesup.php">
              <i class="fa fa-cogs"></i>
              <span>DEMANDE D'INTERVENTION SUPPRIMER</span>
              </a>
          </li>
         
          <li class="sub-menu">
            <a href="listetechsup.php">
              <i class="fa fa-tasks"></i>
              <span>TECHNICIEN SUPPRIMER</span>
              </a>
          </li>
          <li>
            <a  href="listeintersup.php">
              <i class="fa fa-comments-o"></i>
              <span>INTERVENTION SUPPRIMER</span>
              </a>
          </li>
          <li>
            <a  href=" listeulitsup.php">
              <i class="fa fa-users"></i>
              <span>UTILISATEUR SUPPRIMES</span>
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
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="client" method="POST" action="" >
              <table style="border-style: solid;" class="w3-table w3-hoverable w3-striped " >
              <p> <strong> LISTE DES INTERVENTIONS SUPPRIMEES</strong></p>
        <tr style=" padding-right: 20px; " class="w3-blue">
            <td>N°</td>
            <td>matricule utilisateurs</td>
            <td>nom</td>
            <td>prenom</td>
            <td>adresse</td>
            <td>role</td>
            <td colspan='2' style='text-align: center'>Options</td>
        </tr>
     </div>
    </div>
   </div>
 </section>
    <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT * FROM utilisateurs WHERE etat='off' " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        $resultat = mysql_fetch_assoc($sql) ;
           $i = 1 ;
            while($resultat = mysql_fetch_assoc($sql)){
              ?>
                <tr>
                <td><?php echo $resultat["id"] ?></td>  
                <td><?php echo $resultat["numero_utilisateur"] ?></td>
                <td><?php echo $resultat["nom"] ?></td>
                <td><?php echo $resultat["prenom"] ?></td>
                <td><?php echo $resultat["adresse"] ?></td>
                <td><?php echo $resultat["role"] ?></td>
                <td><form action='delutil.php' method='POST'><input type='text' class='d-none' name='pui' value="<?php echo $resultat['id'] ?>"><input type='submit' class='btn btn-primary' name='rer' value='restorer'></form></td>
                </tr>
                <?php
                $i++ ;
            }
    ?>
    </table>
            </div>   
          </div>
     </form>

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
<script type="text/javascript" src="lib/gritter/js/jquery.gri

</body>
</html>
