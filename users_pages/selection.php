<?php
session_start();
   $toto = $_SESSION['nom'];
   $to = $_SESSION['top'];
?>
<table id="seclected" class="table table-striped table-bordered" style="font-size: 14px; text-align: center; ">
  <thead style="color: blue;text-align: center;" class="w3-blue">
  <th>nom de l'intervention</th>
  <th> date</th>
  <th>statut</th>
  <th>description</th>
  <th>NOM technicien</th>
  </thead>
  <tbody>
  <?php
    $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
    $db = mysql_select_db("lsdi") or die(mysql_error()) ;
    $requete = " SELECT nom, dates, statut, descriptions, nom_technicien FROM intervention WHERE nom = '$to' ";
    $sql = mysql_query($requete, $con) or die(mysql_error()) ;
    $resultat = mysql_fetch_assoc($sql) ;
    $i = 1 ;
    while($resultat = mysql_fetch_assoc($sql)){
      ?>
        <tr> 
        <td><?php echo $resultat["nom"];  ?></td>
        <td><?php echo $resultat["dates"] ?></td>
        <td><?php echo $resultat["statut"] ?></td>
        <td><?php echo $resultat["descriptions"] ?></td>
        <td><?php echo $resultat["nom_technicien"] ?></td>
        </tr> 
        <?php
        $i++ ;
        echo $to;
        }
      ?>
  </tbody>
</table>