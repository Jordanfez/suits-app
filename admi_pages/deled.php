<?php
 
if (isset($_POST['supprime'])) {
    $id = $_POST['topi'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE administrateurs SET etat ='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeadministrateur.php") ;
}

if (isset($_POST['update'])) {
    $code = $_POST['code'];
    $nom = $_POST['nom'] ;
    $prenom = $_POST['prenom'] ;
    $adresse = $_POST['adresse'] ;
    $telephone = $_POST['telephone'] ;
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE administrateurs SET code ='$code', nom='$nom', prenom='$prenom', adresse='$adresse', telephone='$telephone' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeadministrateur.php") ;
}

?>