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
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="client" method="POST" action="" >
              <table id="tableau" class="table table-striped table-bordered" style="text-align: center; width: 98% " >
              <p> <strong> LISTE DES INTERVENTIONS SUPPRIMEES</strong></p>
              <thead style="color: blue;text-align: center;" class="w3-blue">
                  <td>N°</td>
                  <td>numero intervention</td>
                  <td>dates</td>
                  <td>nature</td>
                  <td>durée</td>
                  <td>observationt</td>
                  <td>matricule technicien</td>
                  <td>Options</td>
            </thead>
     </div>
    </div>
   </div>
 </section>
    <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT * FROM intervention WHERE etat='off' " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        $resultat = mysql_fetch_assoc($sql) ;
           $i = 1 ;
            while($resultat = mysql_fetch_assoc($sql)){
              ?>
                <tr>
                <td><?php echo $resultat["id"] ?></td>  
                <td><?php echo $resultat["numero_intervention"] ?></td>
                <td><?php echo $resultat["dates"] ?></td>
                <td><?php echo $resultat["nature"] ?></td>
                <td><?php echo $resultat["durer"] ?></td>
                <td><?php echo $resultat["observation"] ?></td>
                <td><?php echo $resultat["matricule_technicien"] ?></td>
                <td>
                   <!-- modal pour la suppression  -->
                  <button onclick="document.getElementById('prend<?php echo $i ?>').style.display='block'" name="supro" type="submit" class="btn-xm btn-primary" title="restaurer"><i class="fa fa-upload"></i></button>
                      <div class="modal" id="prend<?php echo $i ?>">
                      <div class="modal-content modal-md animate "  style=" position: relative; left: 5%;width: 39%;">
                      <div style="background-color: rgb(69, 201, 211);">
                                   <h1> voulez vous <br> restaurer ce client ?</h1>
                               </div><br><br>
                        <div class="container">
                            <form action='delinter.php' method='POST'  style="text-align: center; width: 45%;">
                              <input type='text' class='d-none' name='po' value="<?php echo $resultat['id'] ?>">
                              <div class="modal-footer" style="float: right;">
                                <button class="btn btn-success"  name='supro' type="submit" >OUI</button>
                                <button class="btn btn-danger" type="reset" onclick="document.getElementById('prend<?php echo $i ?>').style.display='none'" > NON</button>
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
