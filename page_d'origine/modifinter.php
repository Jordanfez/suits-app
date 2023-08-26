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
        if (isset($_POST['modf'])) {
            $id = $_POST['popo'];
            $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
            $db = mysql_select_db("lsdi") or die(mysql_error()) ;
            $requete = " SELECT * FROM intervention WHERE id = '$id' " ;
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
            <form class="popo" method="POST" action="delinter.php">
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">numero intervention</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $resultat['numero_intervention']?>"  name="numero_intervention" required>
                  </div>
                  <div class="form-group">
                  <label for="nom" class="col-sm-2 col-sm-2 control-label">date intervention</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control"  value="<?php echo $resultat['dates']?>" name="dates" required>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">nature</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['nature']?>" name="nature" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">durée</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['durer']?>" name="durer" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">observation</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['observation']?>" name="observation" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">matricule technicien</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['matricule_technicien']?>" name="matricule_technicien" required >
                  </div>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required>
                  </div>
                <button name="modf"  type="submit" class="btn btn-primary" >Valider</button>
                <button name="modf"  type="submit" class='btn btn-success' href="listedemande.php"> retour</button>
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