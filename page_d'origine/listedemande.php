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
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>INTER<span>VENTION</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
      <div style="margin-top: 1%; position : relative; left: 258%;">
        <form action="recherchedemande.php" method = "POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-top: 2%; position: relative; left: 10%; ">
                        <div class="input-group">
                            <input name="search" type="text"  class="form-control bg-light border-0 small" placeholder="RECHERCHE PAR LIEU..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                            <div class="input-group-append">
                             <button name="submit" class="btn btn-primary" type="submit">
                               <i name="submit"> GO</i>
                              </button>
                            </div>
                        </div>
        </form>
        </div>
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
              <p> <strong> LISTE DES DEMANDES D'INTERVENTION DE L'ENTREPRISE </strong></p>
        <tr style=" padding-right: 20px; " class="w3-blue">
            <td>N°</td>
            <td>numero demande</td>
            <td>numero planning</td>
            <td>code client</td>
            <td>date demande</td>
            <td>objet</td>
            <td>demande reçue par</td>
            <td>lieu intervention</td>
            <td>date aller</td>
            <td>date retour</td>
            <td>priorité</td>
            <td colspan='2' style='text-align: center'>Options</td>
        </tr>
     </div>
    </div>
   </div>
 </section>
    <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT * FROM demande WHERE etat ='on' " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        $resultat = mysql_fetch_assoc($sql) ;
           $i = 1 ;
            while($resultat = mysql_fetch_assoc($sql)){
              ?>
                <tr>
                <td><?php echo $resultat["id"] ?></td>
                <td><?php echo $resultat["numero_demande"] ?></td>
                <td><?php echo $resultat["numero_planning"] ?></td>
                <td><?php echo $resultat["code"] ?></td>
                <td><?php echo $resultat["date_demande"] ?></td>
                <td><?php echo $resultat["objet"] ?></td>
                <td><?php echo $resultat["reception"] ?></td>
                <td><?php echo $resultat["lieu_intervention"] ?></td>
                <td><?php echo $resultat["date_aller"] ?></td>
                <td><?php echo $resultat["date_retour"] ?></td>
                <td><?php echo $resultat["prioriter"] ?></td>
                <td><form action='deldema.php' method='POST'><input type='text' class='d-none' name='tito' value="<?php echo $resultat['id'] ?>"><input type='submit' class='btn btn-danger' name='suppe' value='supprimer'></form></td>
                <td>
                    <input type='button' onclick="document.getElementById('msg<?php echo $i ?>').style.display='block'" class='btn btn-secondary' value='modifier'>
                    <div class="modal" id="msg<?php echo $i ?>">
                      <div class="modal-content modal-md animate " style=" width: 70%; margin-left: 17%; margin-top: -9%;">

                      <div class="container ">
                          <div class="modal-header" style="width: 80%">
                            <h1>Formulaire de modification</h1>
                          </div>

                      <form class="tito" method="POST" action="deldema.php">
                          <div class="modal-body col-sm-10">
                                  <input type='text' class='d-none' name='tito' value="<?php echo $resultat['id'] ?>">
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">numero demande</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $resultat['numero_demande']?>"  name="numero_demande" required> <br>
                              </div>
                              <div class="form-group">
                              <label for="nom" class="col-sm-2 col-sm-2 control-label">numero planning</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control"  value="<?php echo $resultat['numero_planning']?>" name="numero_planning" required><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">code</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['code']?>" name="code" required ><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">date_demande</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['date_demande']?>" name="date_demande" required ><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">objet</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['objet']?>" name="objet" required ><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">demande reçue par</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['reception']?>" name="reception" required ><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">lieu intervention</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['lieu_intervention']?>" name="lieu_intervention" required ><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">date aller</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['date_aller']?>" name="date_aller" required ><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">date retour</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['date_retour']?>" name="date_retour" required ><br>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">prioriter</label>
                              <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $resultat['prioriter']?>" name="prioriter" required ><br>
                              </div>
                              <div class="form-group col-sm-12">
                                <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required>
                              </div>

                              <div class="modal-footer" style="float: right;margin-top: -4.5%; ">
                                  <button onclick="getconfirm()" type="submit" name="mod" class="btn btn-primary">Valider</button>
                                  <button type="reset" class="btn btn-danger" onclick="document.getElementById('msg<?php echo $i ?>').style.display='none'">Annuler</button>
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
    </table>
            </div>   
          </div>
     </form>
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

<script>
     function getconfirm(){
        var res=confirm(" Modificatione effectuer avec success");
     }
  </script>
</body>
</html>