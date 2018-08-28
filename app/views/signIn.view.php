<?php require('partials/head.php');?>
<h1>Login Utente Registrato</h1>
<div>
<form action="login" method='post'>

<div class="loginbox">
<div class="loginbox-field">
  <label class="input-label" for="nome">Email</label>
  <input class="input" id="email"  type="text" name="email" required />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="nome">Password</label>
  <input class="input" id="email"  type="password" name="password" required />
  <span class="underline"></span>
</div>
  <button type="submit" class="btn btn-outline">Login</button>
</div>
</form>
<a href="lostPassword">Recupero Password</a>
<a href="contactSupport">Problemi? Contatta l'Help Desk</a>
</div>
<?php require('partials/footer.php');?>
