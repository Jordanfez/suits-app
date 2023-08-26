<?php
  session_start();

  if(!empty($_SESSION["pwd"])){
    $identifiant = $_SESSION["pwd"] ;
    //die($identifiant) ;
  }
  else{
    header("location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body style='background-color: #1690A7';>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="close.php" method="POST">
        <h2 class="form-login-heading">DECONNEXION</h2>
        <div class="login-wrap">
          <p> VOULEZ VOUS VRAIMENT VOUS DECONNECTEZ ?</p>
          <a href="accueil.php"> <input type="button" class="btn btn-theme btn-block" value="NON"></a><br>
          <button name="okay" class="btn btn-theme btn-block"  type="submit" style = "color: while;">OUI</button>
        <hr>
</body>

</html>
