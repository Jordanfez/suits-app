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
      <!--logo start-->
      <a href="index.html" class="logo"><b>INTER<span>VENTION</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a  href="histo.php" style=" margin-top:23%; color: aliceblue;">Retour</a></li>
        </ul>
      </div>

    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
  </section>
  <section id="main-content" >
      <section class="wrapper">
        <div class="row mt"  style="margin-top: 5%; text-align:center; position: relative; left: -9%;">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

            <div class="card-body">
            <div class="">
              <table id="tableau" class="table table-striped table-bordered" style="text-align: center; width: 98% ">
                <thead style="color: blue;text-align: center;" class="w3-blue">
                  <td>MOTIF DE L'INTERVENTION</td>
                  <td>LOCALISATION</td>
                  <td>DATE DEBUT </td>
                  <td>STATUT</td>
                  <td>DATE DE FIN</td>
                  <td>DESCRIPTION</td>
                  <td>NOM DU CLIENT</td>
                  <td>NOM TECHNICIEN EN CHEF</td>
                  <td>OPTION</td>
                </thead>
                <tbody>
 <?php

    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " SELECT * FROM intervention WHERE etat='on'" ;// faire une joiture avec la table client pour avoir le code et le nom du client
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    $resultat = mysql_fetch_assoc($sql) ;
    $i = 1 ;
    while($resultat = mysql_fetch_assoc($sql)){
      ?>
        <tr>
          <td><?php echo $resultat["nom"] ?></td>
          <td><?php echo $resultat["localisation"] ?></td>
          <td><?php echo $resultat["dates"] ?></td>
          <td><?php echo $resultat["statut"] ?></td>
          <td><?php echo $resultat["fin"] ?></td>
          <td><?php echo $resultat["descriptions"] ?></td>
          <td><?php echo $resultat["nom_client"] ?></td>
          <td><?php echo $resultat["nom_technicien"] ?></td>
         <td>
           <form action="fpdf-1-6-es/interventionpdf.php" method="POST">
             <input type="text" name="id" value="<?php echo $resultat["id"] ?>" class="d-none">
              <button name="print" type="submit" class="btn-xm btn-primary"><i class="fa fa-print"></i></button>
            </form>

                    <!-- Debut du modal >
                    <div class="modal" id="msg<?php echo $i ?>">
                      <div class="modal-content modal-md animate " style=" width: 87%; margin-left: 8%">

                        <div class="container " >
                            <h1></h1>
                          <form class="top" method="POST" action="delhistos.php" style="width: 90%; margin-top: -3.5%; text-align: center; position: relative; left: 12%;">
                                <div class="modal-body col-sm-10">
                                <input type='text' class='d-none' name='top' value="<?php echo $resultat['id'] ?>">
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Motif intervention</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $resultat['code']?>"  name="numero_intervention" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">localisation</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control"  value="<?php echo $resultat['localisation']?>" name="matricule_technicien" required><br>
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
                    </div -->
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