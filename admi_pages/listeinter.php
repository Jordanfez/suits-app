<?php
   session_start();
   if (isset($_POST['save'])){
    if(!empty($_POST['nom']) AND !empty($_POST['nom_technicien']) ){
      $nom = htmlspecialchars($_POST['nom']);
      $nom2= htmlspecialchars($_POST['nom_technicien']);
      $con1 = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
      $db = mysql_select_db("lsdi") or die(mysql_error()) ;
      $requete1 = "INSERT INTO effectuer( nom_technicien ,nom, etat) VALUES('$nom', '$nom2','on') " ;
      $sql1 = mysql_query($requete1, $con1) or die(mysql_error()) ;
    }else{
      echo "veuillez compltez les champs...";
  }
}

require_once 'main.php';
$sq = "SELECT nom FROM intervention";

try{
  $stmt=$bdd->prepare($sq);
  $stmt->execute();
  $results=$stmt->fetchAll();
}
catch(Exception $ex){
  echo ($ex -> getMessage());
}
//  recuperation des technicien
$sq1 = "SELECT nom FROM techniciens";

try{
  $stmt1=$bdd->prepare($sq1);
  $stmt1->execute();
  $results1 = $stmt1->fetchAll();
}
catch(Exception $e){
  echo ($e -> getMessage());
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport-width" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="w3.css">
    <link href="img/favicon.png" rel="icon"> 
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="css/datepicker3.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="css/font-awesome.min.css" rel="stylesheet">
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
      <a href="index.html" class="logo"><b>INTER<span>VENTION</span></b></a>
      <!--logo end-->
      <div style="margin-top: 1%; position : relative; left: 40%;">
        <form action="rechercheinter.php" method = "POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-top: 2%; position: relative; left: 10%; ">
                        <div class="input-group">
                            <input name="search" type="text"  class="form-control bg-light border-0 small" placeholder="Recherchez techniciens sur une intervention" size="33" aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                            <div  class="input-group-btn">
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
              <li><a href="historique.php">ENREGISTRER ET TERMEINER</a></li>
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
              <table id="tableau" class="table table-striped table-bordered" style="font-size: 14px; text-align: center; ">
                <thead style="color: blue;text-align: center;" class="w3-blue">
                        <td>code intervention</td>
                        <th style="text-align: center">motif de l'intervention</th>
                        <th> localisation</th>
                        <th>dates</th>
                        <th>fin</th>
                        <th>statut</th>
                        <th>NOM CLIENT</th>
                        <th>OPTION</th>
                </thead>
                <tbody>
          <?php
            $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
            $db = mysql_select_db("lsdi") or die(mysql_error()) ;
            $requete = " SELECT * FROM intervention WHERE etat='on' " ;
            $sql = mysql_query($requete, $con) or die(mysql_error()) ;
            $resultat = mysql_fetch_assoc($sql) ;
              $i = 1 ;
                while($resultat = mysql_fetch_assoc($sql)){
                  ?>
                <tr>
                  <td><?php echo $resultat["code"] ?></td>  
                  <td><?php echo $resultat["nom"];  ?></td>
                  <td><?php echo $resultat["localisation"] ?></td>
                  <td><?php echo $resultat["dates"] ?></td>
                  <td><?php echo $resultat["fin"] ?></td>
                  <td><?php 
                        $resultat["statut"];
                        $val = $resultat["statut"];
                        $A = 'ANNULER';
                        $E =  'EN COURS';
                        $AA = 'ACHEVER';
                        if($val == $A){
                         echo  "<p style = color:orange>$val</p>";
                        }elseif($val == $E){
                          echo  "<p style = color:green>$val</p>";
                        }elseif($val == $AA){
                          echo  "<p style = color:red>$val</p>";
                        }else {
                          echo "rien";
                        }
                  
                  ?></td>
                  <td><?php echo $resultat["nom_client"] ?></td>
                 <td>
                 <button   class="btn-xm btn-primary" onclick="document.getElementById('msg<?php echo $i ?>').style.display='block'"  type="submit" class="btn-xm btn-primary" title="modifier"><i class="fa fa-pencil-square-o"></i></button>
                    <!-- modal  -->
                      
                    <button onclick="document.getElementById('sup<?php echo $i ?>').style.display='block'" name="suppr" type="submit" class="btn-xm btn-danger" title="supprimer"><i class="fa fa-trash"></i></button>
                      <div class="modal" id="sup<?php echo $i ?>">
                      <div class="modal-content modal-md animate "  style=" position: relative; left: 5%;width: 39%;">
                      <div style="background-color: rgb(69, 201, 211);">
                                   <h1> ATTENTION</h1>
                                   <input type='text' class='d-none' name='popo' value="<?php echo $resultat['id'] ?>">
                                   <div class="" style="position: absolute;left: 93%; color: black; margin-top: -13%;">
                                    <button class="btn btn-danger" type="reset" onclick="document.getElementById('sup<?php echo $i ?>').style.display='none'" > X</button>
                                  </div>
                               </div><br><br>
                        <div class="container">
                            <form action='delinter.php' method='POST'  style="text-align: center; width: 45%;">

                              <div class="modal-body col-sm-10">
                                  <h4 style=" width: 123%;"> Voulez-vous supprimer cette intervention ?</h4>
                              </div>
                              <div class="modal-footer" style="float: right;">
                                <button class="btn btn-success"  name='suppr' type="submit" >OUI</button>
                                <button class="btn btn-danger" type="reset" onclick="document.getElementById('sup<?php echo $i ?>').style.display='none'" > NON</button>
                              </div>
                            </form>
                        </div>
                      </div>
                      </div>
                    <!--/Fin du modal  -->
                   <!--debut du modal  -->
                   <button class="btn-xm btn-success btn-xs" onclick="document.getElementById('mod<?php echo $i ?>').style.display='block'" name="ajou" title="voir plus" type="submit"><i class=" fa fa-check"></i></button> 
                    <div class="modal" id="mod<?php echo $i ?>">
                        <div class="modal-content modal-md animate "  style=" position: relative; left: 5%;width: 39%;">
                        <div class="" style="position: absolute;left: 97%; color: black; margin-top: -5%;">
                           <button class="btn btn-danger" type="reset" onclick="document.getElementById('mod<?php echo $i ?>').style.display='none'" > X</button>
                        </div>
                          <div class="container"> <form action='' method='post'  style="text-align: center; width: 45%;">
                                    <h1> information sur l'intervention</h1><hr>
                              <form >
                                 <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">Statut</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["statut"] ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">date intervention</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["dates"] ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">nom technicien</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["nom_technicien"] ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">nom du client</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat['nom_client']?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">nom intervention</label> 
                                   <div class="col-sm-10">
                                   <input type="text" class="form-control" value="<?php echo $resultat["nom"];  ?>">
                                   </div>
                                </div><br><br>
                                <div class="form-group">
                                   <label for="" class="col-sm-2 col-sm-2 control-label">description</label> 
                                   <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $resultat["descriptions"] ?>">
                                   </div>
                                </div><br><br> <br>


                           </form>
                          </div>
                        </div>
                        </div>

                   <!--/Fin du modal  -->
                   <!-- Debut du modal pour la modification avec id =  msg -->
                    <div class="modal" id="msg<?php echo $i ?>" style="overflow: scroll; margin-left: 14%">
                      <div class="modal-content modal-md animate " style=" width: 70%; margin-left: 8%; margin-top: 1%;">
                      <div style="background-color: rgb(69, 201, 211);">
                            <h1 style=" color: white; ">Formulaire de modification</h1>
                          <div class="" style="position: absolute;left: 95%; color: black; margin-top: -5%;">
                           <button class="btn btn-danger" type="reset" onclick="document.getElementById('msg<?php echo $i ?>').style.display='none'" > X</button>
                          </div>
                      </div>

                          <form class="popo" method="POST" action="delinter.php">
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">code intervention</label>
                                <div class="col-sm-10">
                                  <input type="text" maxlength="15" minlength="1" class="form-control" value="<?php echo $resultat['code']?>"  name="nom" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">nom intervention</label>
                                <div class="col-sm-10">
                                  <input type="text" maxlength="35" minlength="1" class="form-control" value="<?php echo $resultat['nom']?>"  name="nom" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">LOCALISATION</label>
                                <div class="col-sm-10">
                                  <input type="text" maxlength="75" minlength="1" class="form-control" value="<?php echo $resultat['localisation']?>"  name="localisation" required><br>
                                </div>
                                <div class="form-group">
                                <label for="nom" class="col-sm-2 col-sm-2 control-label">date intervention</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control"  value="<?php echo $resultat['dates']?>" name="dates" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">statut</label>
                                <div class="col-sm-10">
                                <input type="text" maxlength="15" minlength="1" class="form-control" value="<?php echo $resultat['statut']?>" name="statut" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">date de fin</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $resultat['fin']?>" name="fin" required ><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">descriptions</label>
                                <div class="col-sm-10">
                                <textarea type="text" maxlength="2225" minlength="1" name="descriptions"  cols="92" rows="3" class="form-control"><?php echo $resultat['descriptions']?></textarea><br>  
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">nom client</label>
                                <div class="col-sm-10">
                                  <input type="text" maxlength="15" minlength="1" class="form-control" value="<?php echo $resultat['nom_client']?>"  name="nom" required><br>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">nom du technicien</label>
                                <div class="col-sm-10">
                                <input type="text" maxlength="30" minlength="1" class="form-control" value="<?php echo $resultat['nom_technicien']?>" name="nom_technicien" required ><br>
                                </div>
                                <div class="form-group col-sm-12">
                                  <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required>
                                </div>
                                <div class="modal-footer" style="float: right">
                              <button onclick="getconfirm()" type="submit" name="modf" class="btn btn-primary">Valider</button>
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

     </tbody>
   </table>
            </div>
          </div>      
          </div>
          </div>
        </div>
        <!-- option -->
   <div class="row">
			<div class="col-md-6">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						INTERVENTION 

						<ul class="pull-right panel-settings panel-button-tab-right">
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
                <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

            <div class="clearfix"></div>

            <div class="" id="msg<?php echo $i ?>">
              <div class=" ">
                <div class="x_panel" >
                  <div class="x_content">
                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">TECHNICIEN</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">INFOS</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <br>
                        <h4 style=" text-align: center;"> Ajoutez un ou plusieurs Techniciens sur une intrevention</h4><hr>
                            <form  method="POST" action="">  
                                <div>
                                      <label for=""> Nom du tehnicien</label>
                                      <select   class='form-control' name="nom" id="nom">
                                          <option value=""> CHOISIR UN NOM  parmis ceux proposee</option>
                                          <?php  foreach ($results1 as $output1) {?>
                                            <option value="<?php  echo $output1["nom"]; ?>"> <?php  echo $output1["nom"]; ?> </option>
                                            <?php  }?>
                                      </select><br>
                                    </div>
                                    <div>
                                       <label for=""> Nom de l'intervention</label>
                                       <select  class='form-control' name="nom_technicien" id="nom_technicien" style=" border-top: 5%;">
                                          <option value=""> CHOISIR UN NOM  DE LA LISTE</option>
                                          <?php  foreach ($results as $output) {?>
                                            <option value="<?php  echo $output["nom"]; ?>"> <?php  echo $output["nom"]; ?> </option>
                                            <?php  }?>
                                      </select><br>
                                    </div>
                                    <button name="save" class="btn btn-primary" style="float: right; margin-top: 3%;">ajouter</button>
                                 <br><br>
                               </div>
                           </form>

                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        ICI ne sont que visible les interventions encours effectur par l'entreprise.
                        <table id="seclected" class="table table-striped table-bordered" style="font-size: 14px; text-align: center; ">
                          <thead style="color: blue;text-align: center;" class="w3-blue">
                          <th>nom de l'intervention</th>
                          <th> date</th>
                          <th>statut</th>
                          <th>NOM technicien</th>
                          </thead>
                          <tbody>
                          <?php
                            $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
                            $db = mysql_select_db("lsdi") or die(mysql_error()) ;
                            $requete = " SELECT nom, dates, statut, nom_technicien FROM intervention WHERE statut = 'EN COURS' ";
                            $sql = mysql_query($requete, $con) or die(mysql_error()) ;
                            $resultat = mysql_fetch_assoc($sql) ;
                            $i = 1 ;
                            while($resultat = mysql_fetch_assoc($sql)){
                              ?>
                                <tr> 
                                <td><?php echo $resultat["nom"];  ?></td>
                                <td><?php echo $resultat["dates"] ?></td>
                                <td><?php echo $resultat["statut"] ?></td>
                                <td><?php echo $resultat["nom_technicien"] ?></td>
                                </tr> 
                                <?php
                                $i++ ;
                                }
                              ?>
                          </tbody>
                       </table>
                        <!--form action="" method="POST"> 
                         <div class="">
                            <div class="col-sm-10">                                  
                                <select  class='form-control' name="nom" id="select" style=" border-top: 5%;">
                                            <option value=""> CHOISIR UN NOM  DE LA LISTE</option>
                                            <?php  foreach ($results as $output) {?>
                                              <option value="<?php echo $output["nom"]; if($output != ""){ $_SESSION['top'] = $output['nom']; }  ?>" id="toto"> <?php  echo $output["nom"]; ?> </option>
                                              <?php  }?>
                                </select><br> </div> <input name="sen" type="button" class="btn btn-success" id="val" value="voir"></div>
                           
                       </div>
                      </form-->
                      <div id="result" class="table-responsive"> </div>

 
                      </div>
                    </div>
                  </div>
                </div>
              </div>

								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
					</div>
				</div><!--End .articles-->
     </section>
</section>
<script src="lib/jquery/jquery.min.js"></script>

<script src="js/js2/bootstrap-datepicker.js"></script>
<script src="js/js2/custom.js"></script>
<script src="js/js2/jquery-1.11.1.min.js"></script>
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
<script>
  $(function (){
    $("#result").show();
    $("#select").focusout( function (){
      var tech = $(this).val();
      $("#val").click( function () {
        if(tech != ""){
          $.ajax({
            url: "selection.php",
            method: "post",
            data: {tech: tech},

            success: function (data){
              $("#result").show();
              $("#result").html(data)
            }
          })
        }
      })
    })
  })
</script>
</body>
</html>