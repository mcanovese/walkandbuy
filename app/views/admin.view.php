<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1 class="title">Area Amministrazione</h1>
<p class="title">Per modificare un articolo, utilizza il link di modifica disponibile in ogni pagina articolo </p>

<p>Assegna/Rimuovi Ruolo Azienda</p>
<p>Selezionare il codice fiscale / P.IVA di cui variariare la posizione</p>

<form action="assegnaAzienda" method="POST">
  <select class="input" id="itemUM"  type="select" name="cf" required />
  <?php   foreach($allUser as $utente){
  if($utente->azienda == 1) {echo'<option value='.$utente->cf.'>'.$utente->cf.' Azienda</option> ';}
  else if($utente->azienda == 0){ echo'<option value='.$utente->cf.'>'.$utente->cf.' Utente</option> ';}
}
 ?>

</select>
  <button type="submit" class="btn btn-outline">Assegna Ruolo</button>
</form>



</div>




<?php require('partials/footer.php');?>
</div>
