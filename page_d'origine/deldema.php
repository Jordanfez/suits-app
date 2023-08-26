<?php
 
if (isset($_POST['suppe'])) {
    $id = $_POST['tito'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE demande SET etat ='off'  WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listedemande.PHP") ;

    
    $tache =  "SUPPRESSION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une suppression ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}
}

if (isset($_POST['rest'])) {
    $id = $_POST['A'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE demande SET etat ='on'  WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listedemande.PHP") ;

    $tache =  "RESTAURATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une restauration ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion4 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion4, $con) or die(mysql_error()) ;
}

if (isset($_POST['mod'])) {
    $code = $_POST['numero_demande'];
    $nom = $_POST['numero_planning'] ;
    $prenom = $_POST['code'] ;
    $telephone = $_POST['date_demande'] ;
    $objet = $_POST['objet'] ;
    $reception = $_POST['reception'] ;
    $intervention = $_POST['lieu_intervention'] ;
    $aller = $_POST['date_aller'] ;
    $retour = $_POST['date_retour'] ;
    $prioriter = $_POST['prioriter'] ;
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE demande SET numero_demande ='$code', numero_planning='$nom', code='$prenom', date_demande='$telephone', objet='$objet', reception='$reception', lieu_intervention='$intervention', date_aller='$aller', date_retour='$retour', prioriter='$prioriter' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listedemande.PHP") ;

    
    $tache =  "MODIFICATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a modifier Mr/Mme"." ".$_POST['nom']." ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion1 = mysql_query($insertion, $con) or die(mysql_error());
}

?>