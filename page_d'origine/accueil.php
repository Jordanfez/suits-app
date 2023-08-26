<?php
  session_start();

  if(!empty($_SESSION["pwd"])){
    $identifiant = $_SESSION["pwd"] ;
    //die($identifiant) ;
  }
  else{
    header("location: index.php");
  }

  if (isset($_POST['envoi'])){
    if(!empty($_POST['nom']) || !empty($_POST['localisation']) || !empty($_POST['dates']) || !empty($_POST['statut']) || !empty($_POST['fin']) || !empty($_POST['descriptions']) || !empty($_POST['nom1']) || !empty($_POST['nom_technicien']) ){
      $code = htmlspecialchars($_POST['nom']);
      $local = htmlspecialchars($_POST['localisation']);
      $nom = htmlspecialchars($_POST['dates']);
      $prenom = htmlspecialchars($_POST['statut']);
      $telephone = htmlspecialchars($_POST['fin']);
      $fax = htmlspecialchars($_POST['descriptions']);
      $fax1 = htmlspecialchars($_POST['nom1']);
      $email = htmlspecialchars($_POST['nom_technicien']);
      $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
      $db = mysql_select_db("lsdi") or die(mysql_error()) ;
      $requete = "INSERT INTO intervention(nom,localisation, dates, statut, fin, descriptions,nom_client, nom_technicien, etat) VALUES('$code', '$local', '$nom', '$prenom', '$telephone', '$fax', '$fax1', '$email','on') " ;
      $sql = mysql_query($requete, $con) or die(mysql_error()) ;
      header("location: accueil.php ") ;
    }else{
      echo "veuillez compltez les champs...";
  }
}
    // enregistrement du traitement
 /* if(isset($_POST['envoi'])){

    $tache =  "ENREGISTREMENT";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer  l'enregistrement de Mr/Mme"." ".$_SESSION['nom']." ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion = $bdd->prepare("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
    $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
    }*/
    require_once 'main.php';
    $sq = "SELECT nom FROM techniciens";
 
    try{
      $stmt=$bdd->prepare($sq);
      $stmt->execute();
      $results=$stmt->fetchAll();
    }
    catch(Exception $ex){
      echo ($ex -> getMessage());
    }

    if (isset($_POST['enregistrer'])){
      if(isset($_POST['code']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['telephone']) || !empty($_POST['fax']) || !empty($_POST['email']) || !empty($_POST['compa']) || !empty($_POST['local'])){
        $code = htmlspecialchars($_POST['code']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $tel = htmlspecialchars($_POST['telephone']);
        $fax = htmlspecialchars($_POST['fax']);
        $email = htmlspecialchars($_POST['email']);
        $email = strtolower($email);
        $compa = htmlspecialchars($_POST['compa']);
        $local = htmlspecialchars($_POST['local']);
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("lsdi") or die(mysql_error()) ;
        $requete = " INSERT INTO client(code, nom_client, prenom, telephone, fax, email, compagnie, localisation, etat) VALUES('$code', '$nom', '$prenom', '$tel', '$fax', '$email','$compa','$local', 'on') " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        header("location: accueil.php ") ;
      }else{
        echo "veuillez rempire tout les chemps...";
      }
  }
  // enregistrement du traitement
     if(isset($_POST['enregistrer'])){
  
          $tache =  "ENREGISTREMENT";
          $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer  l'enregistrement de Mr/Mme"." ".$_SESSION['nom']." ";
          $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
          $insertion = $bdd->prepare("INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')");
          $insertion->execute(array($tache, $description, $date)) or die("Erreur d'exécution ");
       
         
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport-width" content="width=device, initial-scale=10">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>suivi des interventions</title>

  <!-- Favicons -->
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
  <link rel="stylesheet" href="style1.css">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <link rel="stylesheet" href="Modal/css/style1.css">
  <link rel="stylesheet" href="datatables.net-bs/js/dataTables.bootstrap.min.css">
  <script src="Modal/js/modal1.js"></script>
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
   <div class="contact" style="background-color:#4ecdc4; "><br>
        <p style="text-align: center; color: black;"><strong> SUIVI DES INTERVENTIONS</strong></p>
        <div class="maket">
        <img style="position: relative; color: black; right: -1%; margin-top: -4.5%;" src="img/suit.png" alt="">
          </p>
       </div>
    </div>
    </header>
  </section>

  <section id="container">
        <!-- **********************************************************************************************************************************************************
            TOP BAR CONTENT & NOTIFICATIONS
            *********************************************************************************************************************************************************** -->
        <!--header start-->

        <header class="header black-bg" style="  margin-top: 5%;">
          <div class="sidebar-toggle-box">
          <!--logo start-->
          <!-- a class="logo"><b>INTER<span>VENTION</span></b></a -->
          <!--logo end-->                   
        </div>
        <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.php">DECONNEXION</a></li>
        </ul>
      </div>    
        </header>

   <aside >
      <div id="sidebar" class="nav-collapse " style="  margin-top: 7%;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          </li>
          <li class="sub-menu">
            <a href="">
              <i class="fa fa-desktop"></i>
              <span>CLIENT</span>
              </a>
            <ul class="sub">
              
              <li><a href="enregistrementclient.php">NOUVEAU CLIENT</a></li>
              <li><a href="listeclient.php">LISTE</a></li>
            </ul>
          </li>
          <!--li class="sub-menu">
            <a href="">
              <i class="fa fa-comments-o "></i>
              <span>DEMANDE <br> D' INTERVENTION</span>
              </a>
            <ul class="sub">
              <li><a href="demande_intervention.php">AJOUTER</a></li>
              <li><a href="listedemande.php">LISTE</a></li>

            </ul>
          </li-->
          <li class="sub-menu">
            <a href="">
              <i class="fa fa-tasks"></i>
              <span>TECHNICIEN</span>
              </a>
            <ul class="sub">
                <li><a href="technicien.php">AJOUTER</a></li>
                <li><a href="listetech.php">LISTE</a></li>
            </ul>
          </li>       
          <li class="sub-menu">
            <a  href="">
              <i class="fa fa-tags"></i>
              <span>INTERVENTION</span>
              </a>
              <ul class="sub">
              <li><a href="intervention.php">ENREGISTRMENT INTERVENTION</a></li>
                <li><a href="listeinter.php">LISTE</a></li>
            </ul>
          </li>
          <li>
            <a href="">
              <i class="fa fa-book"></i> <span>HISTORIQUE</span></a>
              <ul class="sub">
              <li><a href="historique.php">ENREGISTREMENT</a></li>
              <li><a href="histo.php">Choix de l'Historique</a></li>
            </ul>
            </a>
          </li>
          <!--li>
            <a href="">
              <i class="fa fa-bar-chart-o"></i> 
              <span>PLANNING <br> D'INTERVENTION</span>
            </a>
              <ul class="sub">
              <li><a href="planning.php">ENREGISTREMENT</a></li>
              <li><a href="listeplan.php">LISTE</a></li>
            </ul>
            </a>
          </li-->
          <li>
            <a href="">
              <i class="fa fa-users"></i>
              <span>UTILISATEURS </span>
              </a>
              <ul class="sub">
              <li><a href="profil.php">Gestion de compte</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
  <section id="main-content">
  <section class="wrapper"  >

  
		<div class="row" style="  margin-top: 9%;">
			<div class="col-md-6">
				<div class="panel panel-default articles">
					<div class="panel-heading">
          <h4 style="color: rgb(17, 122, 184);">Nouvelle intervention</h4>
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em></em></span></div>
					<div class="panel-body articles-container">
				
						<div class="article">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-10 col-md-10">
										 <br><br>
                    <form action="" method="POST">
                      <div>
                              <div class="">
                                <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Nom</label>
                                <div class="col-sm-10">
                                  <input id="numero" maxlength="30" minlength="1" name="nom" type="select" class="form-control" placeholder="Entrez le nom de l'intervention " autocomplete="off" required="" /><br>
                                </div>
                          </div>
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">localisation</label>
                              <div class="col-sm-10">
                                <input id="date" maxlength="25" minlength="1" name="localisation" type="text" class="form-control" placeholder="Entrer la localisation"autocomplete="off" required="" /><br>
                                </div>
                          </div>
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Date</label>
                              <div class="col-sm-10">
                                <input id="date" name="dates" type="date" class="form-control" placeholder="Date debut de  l'intervention"autocomplete="off" required="" /><br>
                                </div>
                          </div> 
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Statut</label>
                              <div class="col-sm-10">
                                  <select id="nature" name="statut" class="form-control">
                                      <option value="EN COURS">EN COURS</option>
                                      <option value="ACHEVER">ACHEVER</option>
                                      <option value="ANNULER">ANNULER</option>
                                    </select>  <br>
                              </div>
                          </div> 
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">date </label>
                                <div class="col-sm-10">
                                    <input id="durer" type="date" name="fin" class="form-control" placeholder="Entrez la date de fin de l'intervention " autocomplete="off" required="" /><br>
                              </div>
                          </div>   
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">DESCRIPTION</label>
                              <div class="col-sm-10">
                                  <textarea id="opo"maxlength="2225" minlength="1" name="descriptions" id="" cols="92" rows="1" class="form-control" placeholder="Saisir la description de l'intervention " autocomplete="off" required="" /></textarea><br>
                              </div>
                          </div> 
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">nom</label>
                              <div class="col-sm-10">
                                  <input  name="nom1" maxlength="20" minlength="1"   class="form-control" placeholder="Entrer le nom du client " autocomplete="off" required="" /><br>
                              </div>
                          </div> 
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;">Technicien</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="nom_technicien" id="nom_technicien">
                                      <option value=""> CHOISIR UN NOM  DE LA LISTE</option>
                                      <?php  foreach ($results as $output) {?>
                                        <option value="<?php  echo $output["nom"]; ?>"> <?php  echo $output["nom"]; ?> </option>
                                        <?php  }?>
                                    </select><br>
                                  </div>
                          </div> 
                          <div class="">
                              <label class="col-sm-2 col-sm-2 control-label" style=" color: black; opacity: 77%;"></label>
                                <div class="col-sm-10">
                                      <br>
                                </div>
                          </div>
                          <div class="ln_solid">
                            <div class="form-group row">
                              <div class="modal-footer" style="float: right">
                              <nav style="text-align:center;">
                                <input  id="send" type="submit" name="envoi" class="btn btn-success" value="enregistrer">
                                            
                                <button class="btn btn-primary" type="reset">annuler</button>	
                                  </nav>
                                </div>
                              </div>
                          </div>  
                    </div>
                   </form>
                  </div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
					</div>
				</div><!--End .articles-->
			
			</div><!--/.col-->
			
			<div class="col-md-6">
				 
				<div class="panel panel-default ">
					<div class="panel-heading">
          <h4 style="color: rgb(17, 122, 184);">Nouveau client</h4> <br>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
                  <form class="client" method="POST" action=""   >
                      <div class="form-group">
                        <div class="col-md-14 col-xs-11"style="width: 85%;padding-right:1%;"> <br>  

                        <div>
                          <label for=""  class="col-sm-2 col-sm-2 control-label" style="color : black; opacity: 77%;"><strong> CODE CLIENT</strong></label>              
                          <div class="col-sm-10" >
                            <input id="code" maxlength="15" minlength="1" name='code' type="text" class="form-control" placeholder="Entrez le code client" autocomplete="off" required="" /><br>
                          </div>
                      </div>
                      <div>
                          <label class="col-sm-2 col-sm-2 control-label" for="" style="color :  black; opacity: 77%;"> NOM CLIENT</label> 
                          <div class="col-sm-10" >
                            <input id="nom" maxlength="15" minlength="1" name='nom' type="text" class="form-control" placeholder="Entrez le nom du client" autocomplete="off" required="" /><br>
                          </div> 
                        </div>
                        <div>
                          <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> PRENOM CLIENT</label>  
                          <div class="col-sm-10">
                            <input id="prenom" maxlength="15" minlength="1" name='prenom' type="text" class="form-control" placeholder="Entrez le prénom du client" autocomplete="off" required="" /><br>
                          </div>
                        </div>
                        <div>
                          <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> NUMERO TELEPHONE</label> 
                          <div class="col-sm-10">
                          <input id="telephone" maxlength="12" minlength="1" name='telephone' type="text" class="form-control" placeholder="Téléphone du client" autocomplete="off" required="" /><br>
                          </div> 
                        </div>
                        <div>
                          <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> FAX CLIENT</label> 
                          <div class="col-sm-10" > 
                            <textarea id = "client" maxlength="60" minlength="1" name="fax" id="" cols="92" rows="1" class="form-control" placeholder="description du client" autocomplete="off" required="" /></textarea><br>
                          </div>
                        </div>
                      <div>
                          <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> ADRESSE </label> 
                          <div class="col-sm-10"> 
                            <input id="email" maxlength="25" minlength="1" name='email' type="text" class="form-control" placeholder="Email du client" autocomplete="off" required="" /><br>
                          </div> 
                        </div> 
                        <div>
                          <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> compagnie </label> 
                          <div class="col-sm-10"> 
                            <input id="compa" maxlength="25" minlength="1" name='compa' type="text" class="form-control" placeholder="Compagnie du client" autocomplete="off" required="" /><br>
                          </div> 
                        </div>
                        <div>
                          <label for="" class="col-sm-2 col-sm-2 control-label" style="color :  black; opacity: 77%;"> Locatisation </label> 
                          <div class="col-sm-10"> 
                            <input id="local" maxlength="30" minlength="1" name='local' type="text" class="form-control" placeholder="Localisation du client" autocomplete="off" required="" /><br>
                          </div> 
                        </div>
                  </div>
                </div>   
                      <div class="form-group row">
                        <div class="modal-footer" style="float: right">
                            <button id="submit" name='enregistrer' type="submit" class="btn btn-success"> Enregistrer</button>
                            <button class="btn btn-primary" type="reset">annuler</button>	
                          </div>
                      </div>
                  </form>

								</div>
							</li>
						</ul>
					</div>
				</div>

      <!--footer end-->
    </section>
<section class="wrapper" > 
<div class="row">
  <div class="col-md-11">
    <div class="panel panel-default articles">
      <div class="panel-heading">
      <h4 style="color: rgb(17, 122, 184);">liste des interventions recentes</h4> 
      <span class="pull-right clickable panel-toggle panel-button-tab-left"></span></div>
      <div class="panel-body articles-container">
        <div class="article border-bottom">

          <div class="col-xs-12">
            <div class="row">
            <div class="col-lg-12">
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

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="sweetalert/sweetalert.min.js"></script>
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
    <script src="datatables.net/js/dataTables.bootstrap.min.js"></script>
    <script src="datatables.net/js/jquery.dataTables.min.js"></script>
    <script>
      $("#send").click(function(){
         var numero = $("#numero").val();
         var date = $("#date").val();
         var nature = $("#nature").val();
         var durer = $("#telephone").val();
         var opo = $("#opo").val();
         var matricule = $("#matricule").val();
         var etat = $("#etat").val();

         if(numero == '' || date == '' || nature == '' || durer == '' || opo == '' || matricule == '' || etat ==''){

              swal({
                  title: "Invalide",
                  text: "Veuillez completer les champs!",
                  icon: "error",
                  button: "ok",
            });
         }else{
              swal({
                  title: "Good job!",
                  text: "Enregistrement reussi",
                  icon: "success",
                  button: "OK",
            });
         }
      });
  </script>
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
      <script>
      $("#submit").click(function(){
         var code = $("#code").val();
         var nom = $("#nom").val();
         var prenom = $("#prenom").val();
         var telephone = $("#telephone").val();
         var client = $("#client").val();
         var email = $("#email").val();
         var etat = $("#etat").val();

         if(code == '' || nom == '' || prenom == '' || telephone == '' || client == '' || email == '' || etat ==''){

              swal({
                  title: "Invalide",
                  text: "Veuillez completer les champs!",
                  icon: "error",
                  button: "ok",
            });
         }else{
              swal({
                  title: "Good job!",
                  text: "Enregistrement reussi",
                  icon: "success",
                  button: "OK",
            });
         }
      });
  </script>
    <script>
    $(function (){
        $("#tableau").DataTable() ;
    } )
</script>
<script>
    $(function (){
        $("#tableau").DataTable() ;
    } )
</script>
</div>           
</body>
</html>