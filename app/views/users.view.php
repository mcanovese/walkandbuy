<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Profilo Utente</h1>
</div>

<?php
echo $user->idutente;
echo $user->cognome;
echo $user->nome;
echo $user->cf;
echo $user->telefono;
echo $user->email;



?>



<?php require('partials/footer.php');?>
</div>
