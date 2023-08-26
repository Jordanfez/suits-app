<?php
 
if (isset($_POST['supp'])) {
    $id = $_POST['tota'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE techniciens SET etat ='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listetech.php") ;

    $tache =  "SUPPRESSION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une suppression ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}

if (isset($_POST['resto'])) {
    $id = $_POST['to'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE techniciens SET etat ='on' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listetech.php") ;

    $tache =  "RESTAURATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une restauration ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}

if (isset($_POST['modifi'])) {
    $code = $_POST['matricule'];
    $nom = $_POST['nom'] ;
    $prenom = $_POST['prenom'] ;
    $telephone = $_POST['adresse'] ;
    $service = $_POST['service'];
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE techniciens SET matricule ='$code', nom='$nom', prenom='$prenom', adresse='$telephone', etat_service='$service' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listetech.PHP") ;

    $tache =  "MODIFICATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a modifier Mr/Mme"." ".$_POST['nom']." ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion1 = mysql_query($insertion, $con) or die(mysql_error());
}

?>