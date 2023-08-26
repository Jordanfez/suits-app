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
        if (isset($_POST['mdfi'])) {
            $id = $_POST['tote'];
            $con = mysql_connect("localhost", "root", "") or die(mysql_error()) ;
            $db = mysql_select_db("lsdi") or die(mysql_error()) ;
            $requete = " SELECT * FROM planning WHERE id = '$id' " ;
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
            <form class="tote" method="POST" action="delplan.php">
              <div class="form-group">
                  <div class="form-group">
                  <label for="nom" class="col-sm-2 col-sm-2 control-label">numero de planning</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control"  value="<?php echo $resultat['numero_planning']?>" name="numero_planning" required>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">objectif</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['objectif']?>" name="objectif" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">description</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['description']?>" name="description" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ressource</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['ressource']?>" name="ressource" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">dates</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['dates']?>" name="dates" required >
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">durées</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $resultat['durees']?>" name="durees" required >
                  </div>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control d-none "  value="<?php echo $resultat['id']?>" name="id" required>
                  </div>
                <button onclick="getconfirm()" name="mdfi"  type="submit" class="btn btn-primary" >Valider</button>
                <button name="mdfi"  type="submit" class='btn btn-danger' href="listeplan.php"> Annuler </button>
            </form>
            </section>
          </div>
        </div>
      </section>
            
    <?php   
        }
    ?>

<script>
     function getconfirm(){
        var res=confirm(" Modificatione effectuer avec success");
     }
  </script>
</body>
</html>