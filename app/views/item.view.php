<div id="container">
<?php require('partials/head.php');?>



<?php if(isset($action) && $action == "newItem") :?> <!-- inserimento nuovo articolo -->

<h1>Inserimento Nuovo Articolo</h1>
<p>Completa il form per effettuare l'inserimento di un articolo nel tuo inventario</p>

<form action="insertItem" method="post">
<div id="body">
  <div class="loginbox">
  <div class="loginbox-field">
    <label class="input-label" for="nome">Nome Prodotto</label>
    <input class="input" id="itemName"  type="text" name="itemName" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Descrizione Prodotto</label>
    <input class="input" id="itemDesc"  type="text" name="itemDesc" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Prezzo di Listino</label>
    <input class="input" id="itemPrice"  type="text" name="itemPrice" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Unit&agrave Misura</label>
    <select class="input" id="itemUM"  type="select" name="itemUM" required />
    <?php

    foreach($um as $umisura)
    echo'<option value='.$umisura->idum.'>'.$umisura->descrizione.'</option> ';

    ?>

  </select>




    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Carica Foto</label>
    <input class="input" id="itemPhoto"  type="file" name="itemPhoto" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Sconto</label>
    <input class="input" id="itemDiscount"  type="text" name="itemDiscount" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Categoria</label>
    <select class="input" id="itemCat"  type="select" name="itemCat" required />
    <?php

    foreach($cat as $categoria)
    echo'<option value='.$categoria->idcategoria.'>'.$categoria->descrizione.'</option> ';

    ?>

</select>
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Giacenza</label>
    <input class="input" id="itemCat"  type="text" name="itemStock" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Abilitato</label>
    <input class="input" id="itemCat"  type="radio" name="itemStatus" value='1'  required checked/> Si
    <input class="input" id="itemCat"  type="radio" name="itemStatus" value ='0' required /> No
    <span class="underline"></span>
  </div>

   <div class="loginbox-field">
    <label class="input-label" for="nome">Quantità</label>
    <input class="input" id="itemCat"  type="text" name="itemQuantity" required />
    <span class="underline"></span>
  </div>

  <button type="submit" class="btn btn-outline">Inserisci Articolo</button>



</form>
</div>


</div>

<?php require('partials/footer.php');?>
</div>


<?php else : ?>
<div id=body>

<div class="breadcrumb">
Breadcrumb?
</div>
<div class="split">
<div class="split col-img">
<div class="prod-img">
  <?php echo '<img src="../../public/img/product/'.$currentItem->foto.'.jpg'.'" alt="'.$currentItem->nome.'" title="'.$currentItem->nome.'"/> '; ?>
</div>
</div>
<?php
if($edit) echo"<br>PULSANTE MODIFICA"; ?>
<div class="split col-text"> <!-- COLONNA DEL TESTO, CON DETTAGLI-->
<div class="prod-name">
  <h2><?php echo $currentItem->nome; ?><h2>
</div>
<div class="info"> Prezzo: <?php echo $currentItem->prezzoPieno?>&euro; </div>
<div class="info"> Quantit&agrave <?php echo $currentItem->quantita.' '.$currentItem->unitamisura?> </div>
<div class="add-cart">

  <button onclick="location.href='addtocart?cod=<?php echo $currentItem->idProdotto?>'" id="add-cart" title="Aggiungi al carrello">
  <img src="../../public/img/addCart.png" alt="aggiungi al carrello" title="aggiungi al carrello"/>
  </button>
</div>
<div class="top-border"></div> <!-- SISTEMARE -->
<div class="prod-Info"><h4 class="prod-Info">Descrizione<h4>
<p class="info"> <?php echo $currentItem->descrizione ?> </p>
</div>
<div class="prod-Info" ><h4 class="prod-Info">Informazioni generali<h4>
<div class="prod-price info">PREZZO</div>
<div class="prod-seller"><?php echo $currentItem->unitamisura ?>
</div>
</div>
</div>
  <!-- //var_dump da rimuovere / usare solo x vedere voci array -->

</div>

</div>
<?php require('partials/footer.php');?>
<?php endif; ?>
