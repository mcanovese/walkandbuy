<div id="container">
<?php require('partials/head.php');?>
<div id="body">
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
</div>


<?php require('partials/footer.php');?>

</div>
