<?php
//**** Ouverture des session */
session_start();
//* 
$con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
$db = mysql_select_db("lsdi") or die(mysql_error()) ;
//** Création et affection d'une valeur à une variable de session  */
if (isset($_SESSION['pwd'])) {
  $identif = $_SESSION['pwd'];
}
//** */
$sql = " SELECT * FROM utilisateurs WHERE pwd = '$identif' ";
$requete = mysql_query( $sql, $con) or die("errreur d'insertion de votre photo de profil");
$result = mysql_fetch_assoc($requete);
if (empty($result["images"])) {
  $src = "img/user.png";
} else {
  $doc = scandir("img");
  if (in_array($result["images"], $doc)) {
    $destination = "img/" . $result["images"];
    $src = $destination;
  }
}

if (isset($_FILES["profit"]["name"])) {
  $image = $_FILES["profit"]["name"];
  $destination = "img/" . $image;
  $imgPath = pathinfo($destination, PATHINFO_EXTENSION);
  $valid_extension = array("jpg", "png", "jpeg");
  if (!in_array(strtolower($imgPath), $valid_extension)) {
    die("veuillez choisir une image ayant les extesions suivantes '.jpg', '.jpeg', '.png'");
  };
  if ($resultat = move_uploaded_file($_FILES["profit"]["tmp_name"], $destination)) {
   
    $sql = " UPDATE utilisateurs SET images = '$image' WHERE nom = '$identif' ";
    $requete = mysql_query($sql, $con) or die('erreur de modification du profil');
    if ($requete) {
     /* $type_traitement = "Modification de profit";
      $description_traitement = " Vous avez modifié votre profit ";
      $date = date("d") . "/" . date("m") . "/" . date("Y");
      $heure = " a " . date("H:i");
      $sql3 = " INSERT INTO historique VALUES (NULL, '$identif', NULL, '$type_traitement', '$description_traitement', '$date', '$heure') ";
      $requete3 = mysql_query( $sql3, $con) or die("Erreur d'insertion de l'historique");
    */ }

    $doc = scandir("img");

    $sql = " SELECT * FROM utilisateurs WHERE nom = '$identif' AND images = '$image' ";
    $requete = mysql_query( $sql, $con);
    $result = mysql_fetch_assoc($requete);
    $nom = $result['images'];
    if (in_array($nom, $doc)) {
      $src = $destination;
    }
  }
}



     /* $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');

      if(isset($_FILES['profit']) AND !empty($_FILES['profit']['name'])){
        $taillemax = 2097152;
        $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['profit']['size'] <= $taillemax)
        {
          $extensionUpload = strtolower(substr(strrchr($_FILES['profit']['name'], '.'), 1));
              if(in_array($extensionUpload, $extensionValide))
              {
                  $chemin = "img".$_SESSION['login'].".".$extensionUpload;
                  $result = move_uploaded_file($_FILES['profit']['tmp_name'], $chemin);
                  if($result)
                  {
                      $updateimage = $bdd->prepare('UPDATE utilisateurs SET images = :images WHERE id = :id');
                      $updateimage->execute(array(
                          'profit' => $_SESSION['login'].".".$extensionUpload,
                          'login' => $_SESSION['login'] ));
                  }else {
                      $msg = " error d'importation";
                  }
              }else {
                  $msg = " votre photo ne doit etre du format jpg ou jpeg ou gif ou png";
              }
        }else {
            $msg = " votre photo ne doit pas depasser 2 Mega octect";
        }
    }*/

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
    <title>compte utilisateur</title>
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
      <a href="index.html" class="logo"><b>PROFIL<span>-USER</span></b></a>
      <!--logo end-->
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
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>    <!--header end-->
  </section>
  <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
            <!--  Debut modal modification mot de passe -->
            <div class="modal" id="form_update">
                <div class="modal-content modal-md animate " style=" width: 60%; margin-left: 26%; margin-top: 3%;">
                <div class="container">
                    <div style="position: relative;left: 17%;">
                    <h2>Modifier votre mot de passe</h2>
                    <div class="" style="position: absolute;left: 50%; color: black; margin-top: -5%;">
                      <button class="btn btn-danger" onclick="document.getElementById('form_update').style.display='none'">X</button>
                    </div>
                    </div>
                    <div class="modal-body">
                    <form   method="post">
                        <div class="container">
                        <h4> Informations personnelles </h4>
                        <nav style="margin-left: %;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="nom_admin">matricule</label>
                             <input id="numero" type="text" name="numero" class="form-control" placeholder="Entrer votre matricule" required="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="prenom_admin">Ancien mot de passe</label>
                             <input id="passe" type="password" name="passe" class="form-control" placeholder="Entrer le mot de passe actuel" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="contact_admin">nouveau mot de passe</label>
                             <input id="passe1" type="password" name="passe1" class="form-control" placeholder="Entrer le nouveau mot de passe" required="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="mail_admin">confirmer le mot de passe</label>
                            <input id="passe2" type="password" name="passe2" class="form-control" date-parsley-equalto="passe1" placeholder="Confirmer le mot de passe" required="" autocomplete="off">
                            </div>
                        </div>
                        <div  style="margin-left: 60%;">
                            <button id="submit" name="changepass" class="btn btn-primary" type="submit" style="color: white;">Valider</button> &nbsp; <br>
                        </div>
                        </div>
                        <?php

                                $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
                                if (isset($_POST['changepass'])){
                                if(!empty($_POST['numero']) || !empty($_POST['passe']) || !empty($_POST['passe1']) || !empty($_POST['passe2'])){
                                    $code = htmlspecialchars($_POST['numero']);
                                    $passe = htmlspecialchars($_POST['passe']);
                                    $passe1 = htmlspecialchars($_POST['passe1']);
                                    $passe2 = htmlspecialchars($_POST['passe2']);

                                    if( $passe1 == $passe2){

                                    $insertion = $bdd->prepare("UPDATE utilisateurs SET pwd = '$passe2' WHERE numero_utilisateur = '$_POST[numero]' ");
                                    $insertion->execute(array($passe2));

                                    }else{
                                        ?>
                                        <h6 style="color: red;"> La premiere valeur du mot de passe a modifier doit etre identique a la seconde <br><br> ECHEC DE La MISE A JOUR </h6>
                                    <?php
                                    } 
                                }
                                }
                                ?>

                    </form>
                    </div>
                </div>
                </div>
            </div>

            <!--  fin du modal modification mot de passe -->
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel">

            <div class="card-body">
            <div class="card-header">
                <h3 class="card-title" style="margin-top: 1%">
                  <i class="fa fa-user"></i>
                  Mon compte
                </h3>
              </div><!-- /.card-header -->
              <?php
                if (isset($_SESSION['login'])) {
                  $identif = $_SESSION['login'];
                }
                $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
                $db = mysql_select_db("lsdi") or die(mysql_error()) ;
                $requete = " SELECT * FROM utilisateurs WHERE etat='on' AND nom ='$identif' ";
                $sql = mysql_query($requete, $con) or die(mysql_error()) ;
                $result = mysql_fetch_assoc($sql) ;


                ?>
              <div class="card-body row">
                <div class="col-6">
                  <h3>Informations du compte</h3>
                  <table>
                  <tr>
                      <td>Matricule : </td>
                      <td>
                        <h5><?= $result["numero_utilisateur"] ?></h5>
                      </td>
                    </tr>
                    <tr>
                      <td>Nom : </td>
                      <td>
                        <h5><?= $result["nom"] ?></h5>
                      </td>
                    </tr>
                    <tr>
                      <td>Prénom : </td>
                      <td>
                        <h5><?= $result["prenom"] ?></h5>
                      </td>
                    </tr>
                    <tr>
                      <td>Contact : </td>
                      <td>
                        <h5><?php //$result["adresse"] ?></h5>
                      </td>
                    </tr>
                    <tr>
                      <td>E-mail : </td>
                      <td>
                        <h5><?= $result["adresse"] ?></h5>
                      </td>
                    </tr>
                    <tr>
                      <td>Role : </td>
                      <td>
                        <h5><?= $result["roles"] ?></h5>
                      </td>
                    </tr>
                    <tr>
                      <td>Mot de passe : </td>
                      <td>
                        <h5> <?= $result["pwd"] ?></h5>
                      </td>
                    </tr>
                  </table>
                  <button style="margin-left: 50%; opacity: 0.8" onclick="document.getElementById('form_update').style.display='block'" class="btn btn-primary">Modifier</button>
                </div>
                <div>
                  <form  method="post" enctype="multipart/form-data">
                    <img src="<?php echo $src ?>" class="img-circle elevation-2" alt="profil" width="100%" height="200px" ><br><br>
                    <input type="file" name="profit" class="form-control" onchange="form.submit()" style="margin-top: 3%">
                  </form>
                </div>
              </div><!-- /.card-body -->

            </div>
          </div>

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
<script src="sweetalert/sweetalert.min.js"></script>
<script>
    $(function (){
        $("#tableau").DataTable() ;
    } )
</script>
<script>
      $("#submit").click(function(){
         var numero = $("#numero").val();
         var passe = $("#passe").val();
         var passe1 = $("#passe1").val();
         var passe2 = $("#passe2").val();

         if(numero == '' || passe == '' || passe1 == '' || passe2 == ''){

              swal({
                  title: "Invalide",
                  text: "Verifier si tout les champs son bien remplis!",
                  icon: "info",
                  button: "ok",
            });
         }else if(paasse1 != passe2){

            swal({
                  title: "Invalide",
                  text: "le nouveau mot de passe doit etre egale a sa confirmation",
                  icon: "warning",
                  button: "ok",
            });

         }else{
              swal({
                  title: "Good job!",
                  text: "Mise a jours effectuer avec success",
                  icon: "success",
                  button: "OK",
            });
         }
      });
  </script>

</body>
</html>