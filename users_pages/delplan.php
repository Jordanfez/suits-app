<?php
 
if (isset($_POST['suppm'])) {
    $id = $_POST['tote'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE planning SET etat ='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeplan.PHP") ;
}

if (isset($_POST['mdfi'])) {
    $planing = $_POST['numero_planning'];
    $objectif = $_POST['objectif'] ;
    $description = $_POST['description'] ;
    $ressource = $_POST['ressource'] ;
    $dates = $_POST['dates'] ;
    $durees = $_POST['durees'] ;
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE planning SET numero_planning ='$planing', objectif='$objectif', description='$description', ressource='$ressource', dates='$dates', durees='$durees' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listeplan.PHP") ;
}

?>