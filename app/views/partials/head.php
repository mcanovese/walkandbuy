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
  <script src="../../../public/js/main.js"></script>
  <title lang="en">Walk & Buy</title>

</head>
<body>
  <!-- <div  class="top-container">Roba</div>  Per il back to top -->
  <header  class="navbar-container clearfix" id="top" > 
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
  <div id="subHead" class="sub-head navbar">
    <div class="category">
      <a class="sub-head-link" href="./category?id=1">
      <div class="category-img"><img class="category-img" src="./../../../public/img/fruttaVerdura.png"/>
      </div>
      <div class="category-name">Frutta e Verdura
      </div>
      </a>
    </div>
    <div class="category">
    <a class="sub-head-link" href="./category?id=2">
      <div class="category-img"><img class="category-img" src="./../../../public/img/carnePesce.png"/>
      </div>
      <div class="category-name">Carne e Pesce
      </div>
</a>
    </div>
    <div class="category">
    <a class="sub-head-link" href="./category?id=3">
      <div class="category-img"><img class="category-img" src="./../../../public/img/formaggi.png"/>
      </div>
      <div class="category-name">Formaggi
      </div>
</a>
    </div>
    <div class="category">
    <a class="sub-head-link" href="./category?id=4">
      <div class="category-img"><img class="category-img" src="./../../../public/img/conserve.png"/>
      </div>
      <div class="category-name">Conserve e Uova
      </div>
</a>
    </div>
    <div class="category">
      <div class="category-img"><img class="category-img" src="./../../../public/img/vino.png"/>
      </div>
      <div class="category-name">Vino e Bevande
      </div>
    </div>
  </div>
  <div>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><img class="logo-img"src="../../../public/img/up.png"/></button>
  </div>
<script>
window.onscroll = function() {scroll()};
</script>

  <?php require('nav.php');?>
