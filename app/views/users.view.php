<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Profilo Utente</h1>
</div>
<div class="content">
<?php
echo $user->idutente;
?>
</div>

<?php
echo $user->cognome;
echo $user->nome;
echo $user->cf;
echo $user->telefono;
echo $user->email;


?>




<?php require('partials/footer.php');?>
</div>
