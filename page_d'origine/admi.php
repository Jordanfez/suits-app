<?php

    session_start();
    $bdd = new pdo('mysql:host=localhost;dbname=lsdi;charset=utf8;', 'root', '');
    if(isset($_POST['envoi'])){
        if(!empty($_POST['code']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['adresse']) || !empty($_POST['telephone']) || !empty($_POST['pwd'])){
            $code = htmlspecialchars($_POST['code']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $telephone = htmlspecialchars($_POST['adresse']);
            $fax = htmlspecialchars($_POST['telephone']);
            $email = htmlspecialchars($_POST['pwd']);
            $insertion = $bdd->prepare('INSERT INTO administrateurs(code, nom, prenom, adresse, telephonne, pwd)VALUES(?, ?, ?, ?, ?, ?)');
            $insertion->execute(array($code, $nom, $prenom, $telephone, $fax, $email));

            $recupclient = $bdd->prepare('SELECT * FROM administrateurs WHERE code = ? || nom = ? || prenom = ? || adresse = ? || telephone = ? || pwd = ?');
            $recupclient->execute(array($code, $nom, $prenom, $telephone, $fax, $email));
            if($recupclient->rowCount() > 0){
                $_SESSION['code'] = $code;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['adresse'] = $telephone;
                $_SESSION['telephone'] = $fax;
                $_SESSION['pwd'] = $email;
                //$_SESSION['id'] = $recupclient->fecth()['id'];
            }
            //echo $_SESSION['id'];

        }else{
            echo "veuillez compltez les champs...";
        }
    }

?>