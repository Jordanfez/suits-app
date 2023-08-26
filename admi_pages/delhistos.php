<?php
 
if (isset($_POST['supr'])) {
    $id = $_POST['yup'] ;
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE historique SET etat ='off' WHERE id = '$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listehistorique.php") ;
}

if (isset($_POST['modif'])) {
    $numero = $_POST['numero_intervention'];
    $matricule = $_POST['matricule_technicien'] ;
    $code = $_POST['code_client'] ;
    $numero1 = $_POST['numero_utilisateur'] ;
    $nature = $_POST['nature'] ;
    $date = $_POST['dates'] ;
    $id = $_POST['id'];
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " UPDATE historique SET numero_intervention ='$numero', matricule_technicien='$matricule', code_client='$code', numero_utilisateur='$numero1', nature='$nature', dates='$date' WHERE id='$id' " ;
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    header("location: listehistorique.PHP") ;
}

?>