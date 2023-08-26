<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <?php
        if (isset($_POST['modifi'])) {
            $id = $_POST['tota'];
            $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
            $db = mysql_select_db("lsdi") or die(mysql_error()) ;
            $requete = " SELECT * FROM techniciens WHERE id = '$id' " ;
            $sql = mysql_query($requete, $con) or die(mysql_error()) ;
            $resultat = mysql_fetch_assoc($sql) ;

    ?>
  <section id="main-content" style="margin-right:5%;">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
              VEUILLEZ ENTREZ DES NOUVELLES VALEURS SI VOUS SOUHAITEZ FAIRE DES MODIFICATIONS
              </header><br>
            <form class="tota" method="POST" action="deltech.php">
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $resultat['matricule']?>"  name="matricule" required>
                  </div>
                  <div class="form-group">
                    <label for="nom" class="col-sm-2 col-sm-2 control-label">nom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?php echo $resultat['nom']?>" name="nom" required>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">prénom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $resultat['prenom']?>" name="prenom" required >
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">adresse</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $resultat['adresse']?>" name="adresse" required >
                  </div>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required>
                  </div>
                <button name="modifi"  type="submit" class="btn btn-primary" >Valider</button>
                <button name="modifi"  type="submit" class='btn btn-success' href="listetech.php"> retour</button>
            </form>
            </section>
          </div>
        </div>
      </section>
            
    <?php   
        }
    ?>

</body>
</html>