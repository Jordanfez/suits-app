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
  <link rel="stylesheet" href="datatables.net-bs/js/dataTables.bootstrap.min.css">
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
      <a href="index.html" class="logo"><b>TECHNICIEN<span>  SUPPRIMER</span></b></a>
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
            <a href="listetechsup.php">
              <i class="fa fa-tasks"></i>
              <span>TECHNICIEN SUPPRIMER</span>
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
              <div class="card-body">
              <div class="">
              <form class="client" method="POST" action="" >
              <table id="tableau" class="table table-striped table-bordered" style="text-align: center; width: 98% " >
              <thead style="color: blue;text-align: center;" class="w3-blue">
                <td>N°</td>
                <td>matricule technicien</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>adresse</td>
                <td>Options</td> 
            </thead>
        </tr>
     </div>
     </div>
   </div>
   </div>
   </div>
 </section>
    <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT * FROM techniciens WHERE etat='off' " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        $resultat = mysql_fetch_assoc($sql) ;
           $i = 1 ;
            while($resultat = mysql_fetch_assoc($sql)){
              ?>
                <tr>
                  <td> <?php echo $resultat["id"] ?></td>
                  <td> <?php echo $resultat["matricule"] ?></td>
                  <td> <?php echo $resultat["nom"] ?></td>
                  <td> <?php echo $resultat["prenom"] ?></td>
                  <td> <?php echo $resultat["adresse"] ?></td>
                  <td>
                  <!-- modal pour la suppression  -->
                  <button onclick="document.getElementById('pren<?php echo $i ?>').style.display='block'" name="resto" type="submit" class="btn-xm btn-primary" title="restaurer"><i class="fa fa-upload"></i></button>
                      <div class="modal" id="pren<?php echo $i ?>">
                      <div class="modal-content "  style=" position: relative; left: 5%;width: 39%;">
                      <div style="background-color: rgb(69, 201, 211);">
                                   <h1> voulez vous <br> restaurer ce technicien ?</h1>
                               </div><br><br>
                        <div class="container">
                            <form action='deltech.php' method='POST'  style="text-align: center; width: 45%;">
                              <input type='text' class='d-none' name='to' value="<?php echo $resultat['id'] ?>">
                              <div style="float: right; width: 120%;">
                                <button class="btn btn-success"  name='resto' type="submit" >OUI</button>
                                <button class="btn btn-danger" type="reset" onclick="document.getElementById('pren<?php echo $i ?>').style.display='none'" > NON</button>
                              </div>
                            </form>
                        </div>
                      </div>
                      </div -->
                    <!--/Fin du modal  -->

                  </td>
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

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->
<script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="lib/gritter-conf.js"></script>
<script src="datatables.net/js/dataTables.bootstrap.min.js"></script>
<script src="datatables.net/js/jquery.dataTables.min.js"></script>
</body>
</html>
<script>
    $(function (){
        $("#tableau").DataTable() ;
    } )
</script>
</body>
</html>
