<?php require('partials/head.php');?>

<?php echo $messageDisplay;?>

<div>
<form action="registerUser" method='post'>

<div class="loginbox">
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
  <input class="input" id="nome"  type="text" name="nome" required />
  <span class="underline"></span>
</div>
<div class="loginbox-field">
  <label class="input-label" for="nome">Codice Fiscale</label>
  <input class="input" id="codicefiscale"  type="text" name="cf" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="nome">Password</label>
  <input class="input" id="codicefiscale"  type="password" name="password" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="nome">Verifica Password</label>
  <input class="input" id="codicefiscale"  type="password" name="verificaPassword" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="nome">Telefono</label>
  <input class="input" id="telefono"  type="text" name="telefono" required />
  <span class="underline"></span>
</div>
  <button type="submit" class="btn btn-outline">Conferma</button>
</div>
</form>
</div>
<?php require('partials/footer.php');?>
