<div id="container">
<?php require('partials/head.php');?>
<div id="body">



<?php if(isset($action) && $action == "edit") :?>
<h1 class="title">Modifica Profilo Utente</h1>
<p class="title">Di seguito puoi modificare i tuoi dati, &egrave sempre necessario confermare la password, i dati aggiornati </br>
  saranno visibili dal prossimo login</p>
  <form action="updateUser" method='post'>


  <div class="loginbox">
  <div class="loginbox-field">
    <label class="input-label" for="email">Email</label>
    <input class="input" id="email" value="<?php echo $user->email; ?>" type="text" name="email" required />
    <span class="underline"></span>
  </div>
  <div class="loginbox-field">
    <label class="input-label" for="cognome">Cognome</label>
    <input class="input" id="cognome" value="<?php echo $user->cognome; ?>" type="text" name="cognome" required />
    <span class="underline"></span>
  </div>
  <div class="loginbox-field">
    <label class="input-label" for="nome">Nome</label>
    <input class="input" id="nome" value="<?php echo $user->nome; ?>" type="text" name="nome" required />
    <span class="underline"></span>
  </div>
  <div class="loginbox-field">
    <label class="input-label" for="codicefiscale">Codice Fiscale</label>
    <input class="input" id="codicefiscale" value="<?php echo $user->cf; ?>" type="text" name="cf" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="password">Password</label>
    <input class="input" id="password"  type="password" name="password"  />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="verificapassword">Verifica Password</label>
    <input class="input" id="verificapassword"  type="password" name="verificaPassword" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="telefono">Telefono</label>
    <input class="input" id="telefono" value="<?php echo $user->telefono; ?>" type="text" name="telefono" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="telefono">Via </label>
    <input class="input" id="via" value="<?php echo $user->via; ?>" type="text" name="via" required />
    <span class="underline"></span>
  </div>
  <div class="loginbox-field">
    <label class="input-label" for="nome">Paese</label>
    <select class="input" id="paese"  type="select" name="paese" required />

    <option <?php if($user->paese === 'Camposampiero')echo"selected"; ?>value='Camposampiero'>Camposampiero</option>
    <option <?php if($user->paese === 'Campodarsego')echo"selected"; ?>value='Campodarsego'>Campodarsego</option>
    <option <?php if($user->paese === 'Loreggia')echo"selected"; ?>value='Loreggia'>Loreggia</option>
    <option <?php if($user->paese === 'Massanzago')echo"selected"; ?> value='Massanzago'>Massanzago</option>
    <option <?php if($user->paese === 'Trebaseleghe')echo"selected"; ?>value='Trebaseleghe'>Trebaseleghe</option>
    </select>
  
    <span class="underline"></span>
  </div>




    <button type="submit" class="btn btn-outline">Conferma</button>
  </div>
  </form>






<?php require('partials/footer.php');?>
<?php else: ?>
<h1 class="title">Profilo Utente</h1>

<div class="content">
    <div class="user-data">
    <label class="label-detail">Nome:</label>
    <div class="data"> <?php echo $user->nome; ?> </div>
    <label class="label-detail">Cognome: </label>
    <div class="data"><?php echo $user->cognome; ?> </div>
    <label class="label-detail">CF: </label>
    <div class="data"><?php echo $user->cf; ?></div>
    <label class="label-detail">Telefono: </label>
    <div class="data"><?php echo $user->telefono; ?></div>
    <label class="label-detail">E-mail: </label>
    <div class="data"><?php echo $user->email; ?></div>
    <label class="label-detail">Via:</label>
    <div class="data"> <?php echo $user->via; ?> </div>
    <label class="label-detail">Paese:</label>
    <div class="data"> <?php echo $user->paese; ?> </div>

</div>
</div>
<a class="title" href="user?action=edit">Modifica Profilo</a>
</div>


<?php require('partials/footer.php');?>
<?php endif; ?>
</div>
