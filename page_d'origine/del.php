<?php
session_start();
 // suppression et enregistrement de traitement
if (isset($_POST['sup'])) {
    $id = $_POST['toto'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE client SET etat='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeclient.php") ;


    $tache =  "SUPPRESSION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une suppression ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;
}
// restauration d'une suppresion
if (isset($_POST['res'])) {
    $id = $_POST['ta'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE client SET etat='on' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeclient.php") ;

    $tache =  "RESTAURATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a effectuer une restauration ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion0 = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion2 = mysql_query($insertion0, $con) or die(mysql_error()) ;

}
// modification et enregistrement de traitement
if (isset($_POST['modif'])) {
    $code = $_POST['code'];
    $nom = $_POST['nom'] ;
    $prenom = $_POST['prenom'] ;
    $telephone = $_POST['telephone'] ;
    $fax = $_POST['fax'] ;
    $email = $_POST['email'] ;
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE client SET code ='$code', nom='$nom', prenom='$prenom', telephone='$telephone', fax='$fax', email='$email' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeclient.php") ;

    $tache =  "MODIFICATION";
    $description = "Mr/Mme"." ".$_SESSION['login']." a modifier Mr/Mme"." ".$_POST['nom']." ";
    $date = "le"." ".date("d")."/".date("m")."/".date("Y")." "."a"." ".date("H:i");
    $insertion = "INSERT INTO historique2 (type_traitement, descriptions, dates) VALUES('$tache','$description','$date')";
    $insertion1 = mysql_query($insertion, $con) or die(mysql_error());
                          
}

?>