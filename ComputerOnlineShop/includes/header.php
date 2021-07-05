<?php include 'includes/funkcije.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>CompShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <link rel="stylesheet" type="text/css" href="css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #3b3c3d">
  <div class="container">
    <div class="page-header">
      <h1><a href="index.php"><img src="img/logo1.png" id="logo"></a> <small style="color: white;">ompShop</small></h1>
    </div>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> CompShop</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="onama.php">O nama</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <?php if (isset($_SESSION["status"])) { ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Proizvodi
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="proizvodi.php">Desktop racunari</a></li>
                  <li><a href="laptopovi.php">Laptop racunari</a></li>
                  <li><a href="oprema.php">Oprema za racunare</a></li>
                </ul>
              </li>
            <?php } else { ?>
              <li><a href="katalog.php">Katalog</a></li>
            <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php if (isset($_SESSION["status"])) {
                if ($_SESSION["status"]=="admin") { ?>
                 <li><a href="korisnici.php">Korisnici</a></li>
                 <li><a href="shop.php">Shop</a></li>
               <?php } else if ($_SESSION["status"]=="menadzer") { ?>
                <li><a href="narudzbenice.php">Narudzbenice</a></li>
                <li><a href="mail.php">Mail</a></li>


              <?php } ?>
               <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
               <li><a href="korpa.php"><span class="glyphicon glyphicon-shopping-cart"></span> Korpa</a></li>
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Odjavite se</a></li>
             <?php } else { ?>
               <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Prijavite se</a></li>

             <?php } ?>
           </ul>


         </div>
       </div>
     </nav>


