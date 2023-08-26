<?php
 
if (isset($_POST['sup'])) {
    $id = $_POST['toto'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE client SET etat='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeclient.php") ;
}

if (isset($_POST['mdfie'])) {
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
}

?>