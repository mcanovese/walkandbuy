<div id="container">
<?php require('partials/head.php');?>
<div id="body">

<?php if(isset($logout)) : ?>

  <?php echo "<h1>Logout Effettuato</h1>"; ?>

<?php else : ?>
<h1 class="title">Login Utente</h1>
<?php if(isset($result)) echo"<h1 class='title'>Errore di Autenticazione, verificare le credenziali</h1>";?>

<div>
<div class="not-user">
    <span>Non sei ancora uno di noi?<a href="add-user"> Iscriviti &#8594;</a></span>
</div>
<form action="login" method='post'>

<div class="loginbox">
<div class="loginbox-field">
  <label class="input-label" for="email">Email</label>
  <input class="input" id="email"  type="text" name="email" required='required' />
  <span class="underline"></span>
</div>

<div class="loginbox-field">
  <label class="input-label" for="password">Password</label>
  <input class="input" id="password"  type="password" name="password" required='required'/>
  <span class="underline"></span>
</div>
  <button type="submit" class="btn btn-outline">Login</button>
  <a class="little-inpage left" href="#">Recupero Password</a>
  <a class="little-inpage right" href="#">Problemi? Contatta l'Help Desk</a>
</div>

</form>

</div>
<?php endif;?>
</div>
<?php require('partials/footer.php');?>
</div>
