<?php
 
if (isset($_POST['suppr'])) {
    $id = $_POST['popo'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE intervention SET etat='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeinter.php") ;

    
    $tache =  "SUPPRESSION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une suppression ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}

if (isset($_POST['supro'])) {
    $id = $_POST['po'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE intervention SET etat='on' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeinter.php") ;

    $tache =  "RESTAURATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une restauration ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}

if (isset($_POST['modf'])) {
    $code = $_POST['nom'];
    $local = $_POST['localisation'];
    $nom = $_POST['dates'] ;
    $prenom = $_POST['statut'] ;
    $telephone = $_POST['fin'] ;
    $objet = $_POST['descriptions'] ;
    $reception = $_POST['nom_technicien'] ;
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE intervention SET nom ='$code',localisation='$local', dates='$nom', statut='$prenom', fin='$telephone', descriptions='$objet', nom_technicien='$reception' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeinter.php") ;

    
    $tache =  "MODIFICATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une modification";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion1 = mysql_query($insertion, $con) or die(mysql_error());
}

?>