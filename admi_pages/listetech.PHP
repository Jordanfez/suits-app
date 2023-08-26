<!DOCTYPE html>
<html lang="fr">
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
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>TECH<span>NICIEN</span></b></a>
      <!--logo end-->
      <div style="margin-top: 1%; position : relative; left: 50%;">
        <form action="recherchetech.php" method = "POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-top: 2%; position: relative; left: 10%; ">
                        <div class="input-group">
                            <input name="search" type="text"  class="form-control bg-light border-0 small" placeholder="Recherche par nom de technicien" size="25" aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                            <div class="input-group-btn">
                             <button name="submit" class="btn btn-primary" type="submit">
                               <i name="submit"> GO</i>
                              </button>
                            </div>
                        </div>
        </form>
        </div>
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
            
            <li><a href="enregistrementclient.php">enregistrement client</a></li>
              <li><a href="listeclient.php">liste</a></li>
            </ul>
          </li>
          <!--li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>DEMANDE D'INTERVENTION</span>
              </a>
            <ul class="sub">
              <li><a href="demande_intervention.php">AJOUTER</a></li>
              <li><a href="listedemande.php">LISTE</a></li>

            </ul>
          </li-->
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
              <div class="table-responsive">
               <table id="tableau" class="table table-striped table-bordered" style="font-size: 14px; text-align: center; " >
                  <p style="text-align: center;"> <strong> <u> LISTE DES TECHNICIENS DE L'ENTREPRISE </u></strong></p>
                  <thead style="color: blue;text-align: center;" class="w3-blue">           
                    <th>N°</th>
                    <th>matricule technicien</th>
                    <th>Nom</td>
                    <th>Prenom</th>
                    <th>date naissance</th>
                    <th>date d'entrer <br> service</th>
                    <th>adresse</th>
                    <th>Options</th> 
                  </thead>
          </div>
          </div>
        </div>
 </section>
    <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT * FROM techniciens WHERE etat='on' " ;
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
                  <td> <?php echo $resultat["dates_naissance"] ?></td>
                  <td> <?php echo $resultat["dates_entrer"] ?></td>
                  <td> <?php echo $resultat["adresse"] ?></td>
                  <td>
                    <button   class="btn-xm btn-primary" onclick="document.getElementById('msg<?php echo $i ?>').style.display='block'"  type="submit" class="btn-xm btn-primary" title="modifier"><i class="fa fa-pencil-square-o"></i></button>  
                    <!-- modal pour la suppression  -->
                      <button onclick="document.getElementById('prend<?php echo $i ?>').style.display='block'" name="sup" type="submit" class="btn-xm btn-danger" title="supprimer"><i class="fa fa-trash"></i></button>
                      <div class="modal" id="prend<?php echo $i ?>">
                      <div class="modal-content modal-md animate "  style=" position: relative; left: 5%;width: 39%;">
                      <div style="background-color: rgb(69, 201, 211);">
                                   <h1> ATTENTION</h1>
                                   
                                   <div class="" style="position: absolute;left: 93%; color: black; margin-top: -13%;">
                                    <button class="btn btn-danger" type="reset" onclick="document.getElementById('prend<?php echo $i ?>').style.display='none'" > X</button>
                                  </div>
                               </div><br><br>
                        <div class="container">
                            <form action='deltech.php' method='POST'  style="text-align: center; width: 45%;">
                              <input type='text' class='d-none' name='tota' value="<?php echo $resultat['id'] ?>">
                              <div class="modal-body col-sm-10">
                                  <h4 style=" width: 123%;"> Voulez-vous supprimer cette intervention ?</h4>
                              </div>
                              <div class="modal-footer" style="float: right;">
                                <button class="btn btn-success"  name='supp' type="submit" >OUI</button>
                                <button class="btn btn-danger" type="reset" onclick="document.getElementById('prend<?php echo $i ?>').style.display='none'" > NON</button>
                              </div>
                            </form>
                        </div>
                      </div>
                      </div -->
                    <!--/Fin du modal  -->
                    <!-- Debut du modal -->
                    <button class="btn-xm btn-success btn-xs" onclick="document.getElementById('mod<?php echo $i ?>').style.display='block'" name="ajou" title="voir plus" type="submit"><i class=" fa fa-check"></i></button> 
                    <div class="modal" id="mod<?php echo $i ?>">
                        <div class="modal-content modal-md animate "  style=" position: relative; left: 5%;width: 39%;">
                        <div class="" style="position: absolute;left: 97%; color: black; margin-top: -5%;">
                           <button class="btn btn-danger" type="reset" onclick="document.getElementById('mod<?php echo $i ?>').style.display='none'" > X</button>
                        </div>
                          <div class="container"> <form action='' method='post'  style="text-align: center; width: 45%;">
                                    <h1> information sur le technicien</h1><hr>
                              <form >
                                 <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">Matricule</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["matricule"] ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">nom</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["nom"] ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">specialite</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["specialiter"] ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">date entrer_service</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["dates_entrer"] ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">EN service</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat['etat_service']?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">Adresse</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["adresse"] ?>">
                                   </div>
                                </div><br><br> <br>


                           </form>
                          </div>
                        </div>
                        </div>

                    <!--/Fin du modal  -->
                    <!-- Debut du modal -->
                    <div class="modal" id="msg<?php echo $i ?>" style="overflow: scroll; margin-left: 5%">
                      <div class="modal-content modal-md animate " style=" width: 70%; margin-left: 15%">

                        <div class="container ">
                          <div class="modal-header" style="width: 80%">
                            <h1 style=" color: white; ">Formulaire de modification</h1>
                          </div>
                          <button type="reset" class="btn btn-danger" onclick="document.getElementById('msg<?php echo $i ?>').style.display='none'" style="margin-left: 55%; margin-top:-11%">X</button>
                          <form action="deltech.php" method="post">
                            <div class="modal-body col-sm-10">
                              <input type='text' class='d-none' name='tota' value="<?php echo $resultat['id'] ?>">
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">code</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $resultat['matricule']?>"  name="matricule" required><br>
                                </div>
                                <div class="form-group">
                                  <label for="nom" class="col-sm-2 col-sm-2 control-label">nom</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control"  value="<?php echo $resultat['nom']?>" name="nom" required><br>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">prénom</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $resultat['prenom']?>" name="prenom" required ><br>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">specialité</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $resultat['specialiter']?>" name="specialite" required ><br>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">date naissance</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" value="<?php echo $resultat['dates_naissance']?>" name="dates_naissance" required ><br>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">date embauche</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" value="<?php echo $resultat['dates_entrer']?>" name="dates_entrer" required ><br>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">adresse</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $resultat['adresse']?>" name="adresse" required ><br>
                                </div>
                                <div class="">
                                  <label class="col-sm-2 col-sm-2 control-label">En service</label>
                                <div class="col-sm-10">
                                  <select id="nature" name="service" class="form-control">
                                    <option value="EN COURS"><?php echo $resultat['etat_service']?></option>
                                    <option value="Non" style="color: red;">Non</option>
                                    <option value="Licencier">Licencier</option>
                                  </select>  <br>
                                </div>

                                <div class="form-group col-sm-12">
                                  <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required><br>
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer" style="float: right">
                              <button onclick="getconfirm()" type="submit" name="modifi" class="btn btn-primary">Valider</button>
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
                $i+= 1 ;
            }
    ?>
    </table>
            </div>   
          </div>
     </form>
</section>
<section class="wrapper" style=" margin-top: -1%;  margin-left: 1%;"> 
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default articles">
      <div class="panel-heading">
        INTERVENTION EN COURS
      <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class=""></em></span></div>
      <div class="panel-body articles-container">
        <div class="article border-bottom">

          <div class="col-xs-12">
            <div class="row">
            <div class="col-lg-12">
            <div class="form-panel">
             <div class="card-body">
              <div class="table-responsive">
               <table id="tableau1" class="table table-striped table-bordered" style="font-size: 14px; text-align: center; " >
                <thead style="color: blue;text-align: center;" class="w3-blue">
                  <th>N°</th>
                  <th>statut</th>
                  <th>Nom intervention</th>
                  <th>date debut</th>
                  <th>date fin</th>
                  <th>localisation</th>
                  <th>nom du technicien en chef</th>
              </thead>
          </div>
          </div>
        </div>
        <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT id, statut,nom, dates, fin, localisation, nom_technicien FROM intervention  WHERE etat='on' AND statut = 'EN COURS' ORDER BY id ASC LIMIT 5" ;
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

<script>
     function getconfirm(){
        var res=confirm(" Modificatione effectuer avec success");
     }
  </script>
    <script>
    $(function (){
        $("#tableau1").DataTable() ;
    } )
</script>
  <script>
    $(function (){
        $("#tableau").DataTable() ;
    } )
</script>
</body>
</html>