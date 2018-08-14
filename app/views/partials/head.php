<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="stylesheet" href="./../../../public/css/normalize.css" />
  <link type="text/css" rel="stylesheet" href="./../../../public/css/common.css" />
  <link type="text/css" rel="stylesheet" href="./../../../public/css/<?= $routeName ?>.css" />
  <title lang="en">Walk & Buy</title>

</head>
<body>
  <header id="top" class="navbar-container"> <!-- Per il back to top -->
    <div class="navbar container">
      <div class="navbar-left left">
        <a class="navbar-link" href="./" title="Ritorna alla pagina principale">
          <img lang="en" class="logo-img" src="./../../../public/img/logo6.png" alt="Logo Walk & Buy, rimanda alla home" />
        </a>
      </div>



      <ul class="list navbar-right right log-link-container">
        <li class="log-item">
        <a class="navbar-link log-link" href="./signin">Accedi</a>
        </li>
        <li class="log-item">|</li>
        <li class="log-item">
        <a class="navbar-link log-link" href="./add-user">Iscriviti</a>
        </li>
      </ul>

      <ul class="list navbar-center center little">
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

  <?php require('nav.php');?>
