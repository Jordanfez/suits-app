<?php
    if (isset($_POST['delete'])) {
        $nom = $_POST['nomSelected'] ;
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("text") or die(mysql_error()) ;
        $requete = " DELETE FROM toto WHERE nom = '$nom' " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        header("location: liste.php") ;
    }

    if (isset($_POST['update'])){
        $nom = $_POST['nomSelected'] ; 
        $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
        $db = mysql_select_db("text") or die(mysql_error()) ;
        $requete = " SELECT * FROM toto WHERE nom = '$nom' " ;
        $sql = mysql_query($requete, $con) or die(mysql_error()) ;
        $resultat = mysql_fetch_assoc($sql);
        echo  "<h1 style='text-align: center'> Modification sur ".$resultat['nom']."</h1>";
        ?>
        <form method="POST" style='text-align: center'>
            <label for="name">Nom</label><br>
            <input type="text" name="name" value="<?php echo $resultat['nom']?>">
            <p></p>
            <label for="secName">Nom</label><br>
            <input type="text" name="secName" value="<?php echo $resultat['prenom']?>"> <p></p>
            <input type="submit" name='ok' value="OK">
        </form>

        <?php

        if(isset($_POST['ok'])){
            $toto = $_POST['name'];
            $tata = $_POST['secName'] ;
            $naissance = $_POST['naissance'] ; 
            $email = $_POST['email'] ;
            $requete2 = " UPDATE Personne 
                           SET nom= '.$toto.', prenom= '.$tata.' " ;
            $sql2 = mysql_query($requete2, $con) or die(mysql_error()) ; 
            header("location: liste.php") ; 
        }
    }
    
?>