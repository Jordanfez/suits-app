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
      <a href="index.html" class="logo"><b>INTER<span>VENTION</span></b></a>
      <!--logo end-->
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
            
            <li><a href="enregistrementclient.php">enregistrement client</a></li>
              <li><a href="listeclient.php">liste</a></li>
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
              <i class="fa fa-book"></i>
              <span>UTILISATEUR</span>
              </a>
            <ul class="sub">
                <li><a href="utilisateurs.php">AJOUTER</a></li>
                <li><a href="utilisateurliste.php">LISTE</a></li>

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
              <li><a href="historique.php.php">RECHERCHER</a></li>
                <li><a href="listehistorique.php">LISTE DES INTERVENTION</a></li>
            </ul>
            </a>
            <li>
            <a href="histo2.php">
              <i class="fa fa-home"></i> <span>RETOUR AU CHOIX</span></a>
            </ul>
            </a>
          </li>
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
              <table id="tableau" class="table table-striped table-bordered" style="text-align: center; width: 98% ">
                <thead style="color: blue;text-align: center;" class="w3-blue">
                  <td>NUMERO DE L'INTERVENTION</td>
                  <td>MATRICULE TECHNICIEN</td>
                  <td>CODE CLIENT </td>
                  <td>MATRICULE UTILISATEUR</td>
                  <td>NATURE DE L'INTERVENTION</td>
                  <td>DATE DE L'INTERVENTION</td>
                  <td>OPTION</td>
                </thead>
                <tbody>
 <?php

    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " SELECT * FROM historique WHERE etat='on' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    $resultat = mysql_fetch_assoc($sql) ;
    $i = 1 ;
    while($resultat = mysql_fetch_assoc($sql)){
      ?>
        <tr>
          <td><?php echo $resultat["numero_intervention"] ?></td>
          <td><?php echo $resultat["matricule_technicien"] ?></td>
          <td><?php echo $resultat["code_client"] ?></td>
          <td><?php echo $resultat["numero_utilisateur"] ?></td>
          <td><?php echo $resultat["nature"] ?></td>
          <td><?php echo $resultat["dates"] ?></td>
         <td>
           <form action="fpdf-1-6-es/interventionpdf.php" method="POST">
             <input type="text" name="id" value="<?php echo $resultat["id"] ?>" class="d-none">
              <button name="print" type="submit" class="btn-xm btn-primary"><i class="fa fa-print"></i></button>
            </form>

                    <!-- Debut du modal -->
                    <div class="modal" id="msg<?php echo $i ?>">
                      <div class="modal-content modal-md animate " style=" width: 87%; margin-left: 8%">

                        <div class="container " >
                            <h1></h1>
                          <form class="top" method="POST" action="delhistos.php" style="width: 90%; margin-top: -3.5%; text-align: center; position: relative; left: 12%;">
                                <div class="modal-body col-sm-10">
                                <input type='text' class='d-none' name='top' value="<?php echo $resultat['id'] ?>">
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">numero intervention</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $resultat['numero_intervention']?>"  name="numero_intervention" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Matricule du technicien</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control"  value="<?php echo $resultat['matricule_technicien']?>" name="matricule_technicien" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">code du client</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $resultat['code_client']?>" name="code_client" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Matricule de l'utilisateur</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $resultat['numero_utilisateur']?>" name="numero_utilisateur" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nature</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $resultat['nature']?>" name="nature" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Dates de l'intervention</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $resultat['dates']?>" name="dates" required ><br>
                                </div>
                                <div class="form-group col-sm-12">
                                  <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required>
                                </div>
                           </form>
                           </div>
                      </div>
                    </div>
                    <!--/Fin du modal  -->

          </td>
        </tr>
        <?php
     $i++ ;
       }
 ?>
     </tbody>
   </table>
            </div>
          </div>      
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