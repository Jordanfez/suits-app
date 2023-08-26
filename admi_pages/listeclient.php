<!DOCTYPE html>
<html lang="fe">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport-width" content="width=device-width, initial-scale=1.0">
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
    <title>liste des clients</title>
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
      <a href="index.html" class="logo"><b>CLI<span>ENT</span></b></a>
      <!--logo end-->
        <div style="margin-top: 1%; position : relative; left: 40%;">
        <form action="rechercheclient.php" method = "POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-top: 2%; position: relative; left: 10%; ">
                        <div class="input-group">
                            <input name="search" type="text"  class="form-control bg-light border-0 small" placeholder="RECHERCHE PAR NOMS DES CLIENTS" size="33" aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                            <div class="input-group-btn">
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
                <p style="text-align: center;"> <strong> <u> LISTE DES CLIENTS DE L'ENTREPRISE </u> </strong></p>
                <thead style="color: blue;text-align: center;" class="w3-blue">
                  <th>N°</th>
                  <th>code client</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>fax client</th>
                  <th>Options</th>
              </thead>
        </div>
        </div>
      </div>
 </section>
 <!-- section/ afficharge du modal pour modification -->
    <?php
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " SELECT * FROM client WHERE etat='on'";
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        $resultat = mysql_fetch_assoc($sql) ;
           $i = 1 ;
            while($resultat = mysql_fetch_assoc($sql)){
              ?>
               <tr>
                <td><?php echo $resultat["id"] ?></td>
                <td><?php echo $resultat["code"] ?></td>
                <td><?php echo $resultat["nom_client"] ?></td>
                <td><?php echo $resultat["prenom"] ?></td>
                <td><?php echo $resultat["fax"] ?></td>
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
                            <form action='del.php' method='POST'  style="text-align: center; width: 45%;">
                              <input type='text' class='d-none' name='toto' value="<?php echo $resultat['id'] ?>">
                              <div class="modal-body col-sm-10">
                                  <h4 style=" width: 123%;"> Voulez-vous supprimer cette intervention ?</h4>
                              </div>
                              <div class="modal-footer" style="float: right;">
                                <button class="btn btn-success"  name='sup' type="submit" >OUI</button>
                                <button class="btn btn-danger" type="reset" onclick="document.getElementById('prend<?php echo $i ?>').style.display='none'" > NON</button>
                              </div>
                            </form>
                        </div>
                      </div>
                      </div -->
                    <!--/Fin du modal  -->
                    <!-- Debut du modal pour information de l'intervention sur une intervention-->
                    <button class="btn-xm btn-success btn-xs" onclick="document.getElementById('voir<?php echo $i ?>').style.display='block'" name="" class="btn-xm btn-primary" title="voir plus" type="submit"><i class=" fa fa-check"></i></button> 
                    <div class="modal" id="voir<?php echo $i ?>">
                        <div class="modal-content modal-md animate "  style=" position: relative; left: 5%;width: 39%;">
                        <div class="" style="position: absolute;left: 97%; color: black; margin-top: -5%;">
                           <button class="btn btn-danger" type="reset" onclick="document.getElementById('voir<?php echo $i ?>').style.display='none'" > X</button>
                        </div>
                          <div class="container"> <form action='' method='post'  style="text-align: center; width: 45%;">
                                    <h1> information sur le client</h1><hr>
                              <form >
                                 <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">localisation</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat['localisation']?>" name="localisation" required  >
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">compagnie du client</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat['compagnie']?>" name="compagnie" required >
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">adresse mail</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat['email']?>" name="email" required>
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">telephone client</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat['telephone']?>" name="telephone" required>
                                   </div>
                                </div><br><br> <br>


                           </form>
                          </div>
                        </div>
                        </div>
                    <!--/Fin du modal pour site d'information sur l'intervention du technicien -->

                    <!-- Debut du modal pour modification -->
                    <div class="modal" id="msg<?php echo $i ?>" style="overflow: scroll; margin-left: 5%" >
                      <div class="modal-content modal-md animate " style=" width: 70%; margin-left: 15% ; margin-top: 1%;  ">

                        <div class="container " >
                          <div class="modal-header" style="width: 80%">
                            <h1>Formulaire de modification</h1>
                          </div>
                          <button type="reset" class="btn btn-danger" onclick="document.getElementById('msg<?php echo $i ?>').style.display='none'" style="margin-left: 55%; margin-top:-11%">X</button>
                          <form  class="toto" method="POST" action="del.php">
                            <div class="modal-body col-sm-10">
                                <input type='text' class='d-none' name='toto' value="<?php echo $resultat['id'] ?>">
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">code</label>
                                <div class="col-sm-10">
                                  <input id="code" type="text" class="form-control" value="<?php echo $resultat['code']?>"  name="code" placeholder="code"required> <br>
                                </div>
                                <div class="form-group">
                                <label for="nom" class="col-sm-2 col-sm-2 control-label">nom</label>
                                <div class="col-sm-10">
                                <input id="nom" type="text" class="form-control"  value="<?php echo $resultat['nom_client']?>" name="nom" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">prénom</label>
                                <div class="col-sm-10">
                                <input id="prenom" type="text" class="form-control" value="<?php echo $resultat['prenom']?>" name="prenom" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">téléphone</label>
                                <div class="col-sm-10">
                                <input id="telephone" type="text" class="form-control" value="<?php echo $resultat['telephone']?>" name="telephone" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">fax</label>
                                <div class="col-sm-10">
                                <input id="client" type="text" class="form-control" value="<?php echo $resultat['fax']?>" name="fax" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">email</label>
                                <div class="col-sm-10">
                                <input id="email" type="text" class="form-control" value="<?php echo $resultat['email']?>" name="email" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Compagnie</label>
                                <div class="col-sm-10">
                                <input id="compa" type="text" class="form-control" value="<?php echo $resultat['compagnie']?>" name="compagnie" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Localisation</label>
                                <div class="col-sm-10">
                                <input id="local" type="text" class="form-control" value="<?php echo $resultat['localisation']?>" name="localisation" required ><br>
                                </div>
                                <div class="form-group col-sm-12">
                                  <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required><br>
                                </div>
   
                            <div class="modal-footer" style="float: right">
                              <button onclick="getconfirm()" type="submit" name="modif" class="btn btn-primary">Valider</button>
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
     <!-- bibliotheque des script utiliser -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="sweetalert/sweetalert.min.js"></script>
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
        $("#tableau").DataTable() ;
    } )
</script>
</body>
</html>
