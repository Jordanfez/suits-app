<?php
 
if (isset($_POST['suppri'])) {
    $id = $_POST['yup'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE utilisateurs SET etat ='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: utilisateurliste.php") ;

    $tache =  "SUPPRESSION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une suppression ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}

if (isset($_POST['rer'])) {
    $id = $_POST['pui'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE demande SET etat ='on'  WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listedemande.PHP") ;

    $tache =  "RESTAURATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une restauration ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}

if (isset($_POST['modiff'])) {
    $code = $_POST['numero_utilisateur'];
    $nom = $_POST['nom'] ;
    $prenom = $_POST['prenom'] ;
    $telephone = $_POST['adresse'] ;
    $objet = $_POST['roles'] ;
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE utilisateurs SET numero_utilisateur ='$code', nom='$nom', prenom='$prenom', adresse='$telephone', roles='$objet' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: utilisateurliste.PHP") ;

    $tache =  "MODIFICATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une modification";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion1 = mysql_query($insertion, $con) or die(mysql_error());
}

?>