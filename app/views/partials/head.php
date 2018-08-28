<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <link type="text/css" rel="stylesheet" href="./../../../public/css/normalize.css" />
  <link type="text/css" rel="stylesheet" href="./../../../public/css/common.css" />
  <link type="text/css" rel="stylesheet" href="./../../../public/css/<?= $routeName ?>.css" />
  <title lang="en">Walk & Buy</title>

</head>
<body>
  <!-- <div  class="top-container">Roba</div>  Per il back to top -->
  <header  class="navbar-container" id="top" > 
  <div class="header" id="myHeader">
    <div class="navbar container">
      <div id="MyNavLeft" class="navbar-left left">
        <a class="navbar-link" href="./" title="Ritorna alla pagina principale">
          <img lang="en" class="logo-img" id="myImg" src="./../../../public/img/logo6.png" alt="Logo Walk & Buy, rimanda alla home" />
          <img lang="en" class="logo-img hidden" id="myImgLittle" src="./../../../public/img/logoNoScritta.png" alt="Logo Walk & Buy, rimanda alla home" />
        </a>
      </div>
      <ul id="MyNavRight" class="list navbar-right right log-link-container">
        <li class="log-item">
        <a class="navbar-link log-link" href="./signin">Accedi</a>
        </li>
        <li class="log-item">|</li>
        <li class="log-item">
        <a class="navbar-link log-link" href="./add-user">Iscriviti</a>
        </li>
      </ul>

      <ul id="MyNavCenter" class="list center little">
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
  </header>
<script>
  window.onscroll = function() {myFunction()};

  var navLeft = document.getElementById("MyNavLeft");
  var navRight = document.getElementById("MyNavRight");
  var navCenter = document.getElementById("MyNavCenter");
  var img = document.getElementById("myImg");
  var imgLittle = document.getElementById("myImgLittle");
  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");

      navRight.classList.remove("navbar-right");
      navLeft.classList.remove("navbar-left");

      navCenter.classList.add("navbar-center-sticky");
      navRight.classList.add("navbar-right-sticky");
      navLeft.classList.add("navbar-left-sticky");

      img.classList.add("hidden");
      imgLittle.classList.remove("hidden");
    } else {
      header.classList.remove("sticky");

      navCenter.classList.add("navbar-center");
      navRight.classList.add("navbar-right");
      navLeft.classList.add("navbar-left");

      navCenter.classList.remove("navbar-center-sticky");
      navRight.classList.remove("navbar-right-sticky");
      navLeft.classList.remove("navbar-left-sticky");

      img.classList.remove("hidden");
      imgLittle.classList.add("hidden");
    }
  }
</script>
  <?php require('nav.php');?>
