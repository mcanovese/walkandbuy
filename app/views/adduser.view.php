<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="stylesheet" href="./../../../public/css/style.css" />
  <title lang="en">Walk & Buy</title>

</head>
<body class="public">

<form action="adduser" method='post'>
  
<div class="loginbox-field">    
  <label class="input-label" for="nome">Email</label>
  <input class="input" id="email"  type="text" name="email" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">  
  <label class="input-label" for="nome">Cognome</label>
  <input class="input" id="cognome"  type="text" name="cognome" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">  
  <label class="input-label" for="nome">Nome</label>
  <input class="input" id="nome"  type="text" name="name" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">  
  <label class="input-label" for="nome">Codice Fiscale</label>
  <input class="input" id="codicefiscale"  type="text" name="cf" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">  
  <label class="input-label" for="nome">Telefono</label>
  <input class="input" id="telefono"  type="text" name="telefono" required />
  <span class="underline"></span>
</div>
  <button type="submit" class="btn btn-outline">Conferma</button>

</form>
<?php require('partials/footer.php');?>