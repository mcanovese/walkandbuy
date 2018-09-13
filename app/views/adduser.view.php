<div id="container">
<?php require('partials/head.php');?>
<div id="body">

<h1 class="title">Registrazione Utente</h1>
<p class ="title"> Procedi alla creazione del tuo account, l'indirizzo richiesto &egrave quello relativo alla consegna
  degli ordini, che pu&ograve avvenire solo nei comuni del nostro consorzio </p>
<?php
if(isset($result)) echo"<h2>>Registrazione Effettuata</h2> <a href='signin'>Vai al login</a>";
else {
if(isset($messageDisplay)) echo $messageDisplay;?>

<div>
<form action="registerUser" method='post'>

<div class="loginbox">
<div class="loginbox-field">
  <label class="input-label" for="email">Email</label>
  <input class="input" id="email"  type="text" name="email" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">
  <label class="input-label" for="cognome">Cognome</label>
  <input class="input" id="cognome"  type="text" name="cognome" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">
  <label class="input-label" for="nome">Nome</label>
  <input class="input" id="nome"  type="text" name="nome" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">
  <label class="input-label" for="codicefiscale">Codice Fiscale</label>
  <input class="input" id="codicefiscale"  type="text" name="cf" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="password">Password</label>
  <input class="input" id="password"  type="password" name="password" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="verificapassword">Verifica Password</label>
  <input class="input" id="verificapassword"  type="password" name="verificaPassword" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="telefono">Telefono</label>
  <input class="input" id="telefono"  type="text" name="telefono" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="telefono">Via </label>
  <input class="input" id="via"  type="text" name="via" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="nome">Paese</label>
  <select class="input" id="paese"  type="select" name="paese" required />
  <option value='Camposampiero'>Camposampiero</option>
  <option value='Campodarsego'>Campodarsego</option>
  <option value='Loreggia'>Loreggia</option>
  <option value='Massanzago'>Massanzago</option>
  <option value='Trebaseleghe'>Trebaseleghe</option>
  </select>
  <span class="underline"></span>
</div>




  <button type="submit" class="btn btn-outline">Conferma</button>
</div>
</form>
</div>
</div>

<?php }require('partials/footer.php');?>
</div>
