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
        if (isset($_POST['mod'])) {
            $id = $_POST['tito'];
            $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
            $db = mysql_select_db("lsdi") or die(mysql_error()) ;
            $requete = " SELECT * FROM demande WHERE id = '$id' " ;
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
            <form class="tito" method="POST" action="deldema.php">
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">numero demande</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $resultat['numero_demande']?>"  name="numero_demande" required>
                  </div>
                  <div class="form-group">
                  <label for="nom" class="col-sm-2 col-sm-2 control-label">numero planning</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control"  value="<?php echo $resultat['numero_planning']?>" name="numero_planning" required>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">code</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['code']?>" name="code" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">date_demande</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['date_demande']?>" name="date_demande" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">objet</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['objet']?>" name="objet" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">demande reçue par</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['reception']?>" name="reception" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">lieu intervention</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['lieu_intervention']?>" name="lieu_intervention" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">date aller</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['date_aller']?>" name="date_aller" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">date retour</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['date_retour']?>" name="date_retour" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">prioriter</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['prioriter']?>" name="prioriter" required >
                  </div>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required>
                  </div>
                <button name="mod"  type="submit" class="btn btn-primary" >Valider</button>
                <button name="mod"  type="submit" class='btn btn-success' href="listedemande.php"> retour</button>
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