<?php
if(!isset($_SESSION)){
    session_start();
}?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <link type="text/css" rel="stylesheet" href="./../../../public/css/common.css" />
  <link type="text/css" rel="stylesheet" href="./../../../public/css/<?= $routeName ?>.css" />
  <script src="../../../public/js/main.js"></script>
  <title lang="en">Walk & Buy</title>

</head>
<body>
  <?php if(isset($_SESSION['user'])): ?>
  <div class="top-container">
  <div class="top-info">
    <ul class="little">
        <li class="list-item">
        <a class="navbar-link little" href="./howWork">Come funziona</a>
        </li>
        <li class="list-item">
        <a class="navbar-link little" href="./partner">Partner</a>
        </li>
        <li class="list-item">
        <a class="navbar-link little" href="./whoAreWe">Chi siamo</a>
        </li>
    </ul>
    </div>
</div>

  <header  class="navbar-container" id="top" >
  <div class="header" id="myHeader">
    <div class="navbar">
      <div id="MyNavLeft" class="navbar-left">
        <a class="navbar-link" href="./" title="Ritorna alla pagina principale">
          <img lang="en" class="logo-img" id="myImg" src="./../../../public/img/logo6.png" alt="Logo Walk & Buy, rimanda alla home" />
          <img lang="en" class="logo-img hidden" id="myImgLittle" src="./../../../public/img/logoNoScritta.png" alt="Logo Walk & Buy, rimanda alla home" />
        </a>
      </div>

      <div id="MyNavRight" class="navbar-right-logged">
        <?php if($_SESSION['user']->azienda == 3): ?>
        <div class="cart-container">
        <a class="go-cart" href="admin"><img alt="amministrazione" title="amministrazione" src="../../../public/img/cart.png"/></a>
        </div>
        <?php endif;?>
        <div class="cart-container">
        <a class="go-cart" href="cart"><img alt="carrello" title="carrello" src="../../../public/img/cart.png"/></a>
        </div>
        <div class="profile-container">
        <a class="go-profile" href="user"><img alt="profilo" title="profilo" src="../../../public/img/profile.png"/></a>
        </div>
        <div class="exit-container">
        <a class="go-exit" href="logout" ><img alt="logout" title="logout" src="../../../public/img/exit.png"/></a>
        </div>
      </div>
    <div class="topnav">
      <div id="myLinks">
          <a href="cart">Carrello</a>
          <a href="user">Profilo</a>
          <a href="logout" style="color:red;">Logout</a>
      </div>
      <a href="javascript:void(0);" class="icon" onclick="hamMenu()">
      <i class="fa fa-bars"></i>
      </a>
    </div>
  </header>
  <div>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><img class="logo-img"src="../../../public/img/up.png"/></button>
  </div>
<script>
window.onscroll = function() {scroll()};
</script>
  <?php require('nav.php');?>

<?php else : ?>
<div  class="top-container">
<div class="top-info">
    <ul class="little">
        <li class="list-item">
        <a class="navbar-link little" href="./howWork">Come funziona</a>
        </li>
        <li class="list-item">
        <a class="navbar-link little" href="./partner">Partner</a>
        </li>
        <li class="list-item">
        <a class="navbar-link little" href="./whoAreWe">Chi siamo</a>
        </li>
      </ul>
    </div>
    </div>
  <header  class="navbar-container" id="top" >
  <div class="header" id="myHeader">
    <div class="navbar">
      <div id="MyNavLeft" class="navbar-left">
        <a class="navbar-link" href="./" title="Ritorna alla pagina principale">
          <img lang="en" class="logo-img" id="myImg" src="./../../../public/img/logo6.png" alt="Logo Walk & Buy, rimanda alla home" />
          <img lang="en" class="logo-img hidden" id="myImgLittle" src="./../../../public/img/logoNoScritta.png" alt="Logo Walk & Buy, rimanda alla home" />
        </a>
      </div>
      <div id="MyNavRight">
      <ul  class="list navbar-right log-link-container" >
        <li class="log-item">
        <a id="login" class="navbar-link log-link " href="./signin">Accedi</a>
        </li>
        <li id="signin" class="log-item">
        <a class="navbar-link log-link " href="./add-user">Iscriviti</a>
        </li>
      </ul>

</div>
  </header>
  <div>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><img class="logo-img"src="../../../public/img/up.png"/></button>
  </div>
<script>
window.onscroll = function() {scroll()};
</script>
  <?php require('nav.php');?>
  <?php endif; ?>
