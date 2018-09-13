<div id="container">
<?php require('partials/head.php');?>

<?php if(isset($action) && $action == "newItem") :?> <!-- inserimento nuovo articolo -->

<h1 class="title">Inserimento Nuovo Articolo</h1>

<form action="insertItem" enctype="multipart/form-data" method="post">
<div id="body">
  <div class="loginbox">
  <div class="loginbox-field">
    <label class="input-label" for="itemName">Nome Prodotto</label>
    <input class="input" id="itemName" type="text" name="itemName" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="itemDesc">Descrizione Prodotto</label>
    <input class="input" id="itemDesc"  type="text" name="itemDesc" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="itemPrice">Prezzo di Listino</label>
    <input class="input" id="itemPrice"  type="text" name="itemPrice" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="itemUM">Unit&agrave Misura</label>
    <select class="input" id="itemUM"  type="select" name="itemUM" required />
    <?php

    foreach($um as $umisura)
    echo'<option value='.$umisura->idum.'>'.$umisura->descrizione.'</option> ';

    ?>

  </select>




    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="itemPhoto">Carica Foto</label>
    <input class="input" id="itemPhoto"  type="file" name="itemPhoto" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="itemDiscount">Sconto</label>
    <input class="input" id="itemDiscount"  type="text" name="itemDiscount"  />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="itemCat">Categoria</label>
    <select class="input" id="itemCat"  type="select" name="itemCat" required />
    <?php

    foreach($cat as $categoria)
    if($categoria->categoriapadre == NULL) continue;
    else {echo'<option value='.$categoria->idcategoria.'>'.$categoria->descrizione.'</option> ';}

    ?>

</select>
    <span class="underline"></span>
  </div>


   <div class="loginbox-field">
    <label class="input-label" for="itemQnt">Quantità</label>
    <input class="input" id="itemQnt"  type="text" name="itemQuantity" required />
    <span class="underline"></span>
  </div>

  <button type="submit" class="btn btn-outline">Inserisci Articolo</button>



</form>
</div>


</div>

<?php require('partials/footer.php');?>
</div>


<?php elseif (isset($action) && $action == "edit") : ?>

<h1 class="title">Modifica Articolo</h1>

  <form action="updateItem" enctype="multipart/form-data" method="post">
  <input type="hidden" id="itemID" name="itemID" value="<?php echo $_GET['cod']; ?>" ?>
  <div id="body">
    <div class="loginbox">
    <div class="loginbox-field">
      <label class="input-label" for="itemName">Nome Prodotto</label>
      <input class="input" id="itemName"  type="text" value="<?php echo $currentItem->nome; ?>" name="itemName" required />
      <span class="underline"></span>
    </div>

    <div class="loginbox-field">
      <label class="input-label" for="itemDesc">Descrizione Prodotto</label>
      <input class="input" id="itemDesc" value="<?php echo $currentItem->descrizione; ?>" type="text" name="itemDesc" required />
      <span class="underline"></span>
    </div>

    <div class="loginbox-field">
      <label class="input-label" for="itemPrice">Prezzo di Listino</label>
      <input class="input" id="itemPrice" value="<?php echo $currentItem->prezzoPieno; ?>" type="text" name="itemPrice" required />
      <span class="underline"></span>
    </div>

    <div class="loginbox-field">
      <label class="input-label" for="itemUM">Unit&agrave Misura</label>
      <select class="input" id="itemUM"  type="select" name="itemUM" required />
      <?php

      foreach($um as $umisura)
      echo'<option value='.$umisura->idum.'>'.$umisura->descrizione.'</option> ';

      ?>

    </select>




      <span class="underline"></span>
    </div>

    <div class="loginbox-field">
      <label class="input-label" for="itemPhoto">Carica Foto</label>
      <input class="input" id="itemPhoto"  type="file" name="itemPhoto" />
      <span class="underline"></span>
    </div>

    <div class="loginbox-field">
      <label class="input-label" for="itemDiscount">Sconto</label>
      <input class="input" id="itemDiscount" value="<?php echo $currentItem->percentualeSconto; ?>" type="text" name="itemDiscount"  />
      <span class="underline"></span>
    </div>

    <div class="loginbox-field">
      <label class="input-label" for="itemCat">Categoria</label>
      <select class="input" id="itemCat" value="<?php echo $currentItem->categoria; ?>" type="select" name="itemCat" required />
      <?php

      foreach($cat as $categoria)
      if($categoria->categoriapadre == NULL) continue;
      else {echo'<option value='.$categoria->idcategoria.'>'.$categoria->descrizione.'</option> ';}

      ?>

  </select>
      <span class="underline"></span>
    </div>




     <div class="loginbox-field">
      <label class="input-label" for="itemQnt">Quantità</label>
      <input class="input" id="itemQnt" value="<?php echo $currentItem->quantita; ?>" type="text" name="itemQuantity" required />
      <span class="underline"></span>
    </div>

    <button type="submit" class="btn btn-outline">Aggiorna Articolo</button>



  </form>

<?php else : ?>
<div id=body>


<div class="split">
<div class="split col-img">
<div class="prod-img">
  <?php echo '<img src="../../public/userimg/'.$currentItem->foto.'" alt="'.$currentItem->nome.'" title="'.$currentItem->nome.'"/> '; 
  if($edit) echo'<a class="modify" href="item?cod='.$currentItem->idProdotto.'&req=edit">Modifica articolo</a>';?>
</div>
</div>
<?php
$prezzoPieno=$currentItem->prezzoPieno;
 ?>
<div class="split col-text"> <!-- COLONNA DEL TESTO, CON DETTAGLI-->
<div class="prod-name">
  <h2><?php echo $currentItem->nome; ?><h2>
</div>
<div class="info">Prezzo: <?php if ($currentItem->percentualeSconto>0){
            $price=$prezzoPieno-(($prezzoPieno*$currentItem->percentualeSconto)/100);
        echo '<p class="info-text price">&euro;'.$price.'</p>';
        echo '<p class="info-text discount">-'.$currentItem->percentualeSconto.'&#37;&nbsp;|
        <del class="full-price striked">&euro;'.$currentItem->prezzoPieno.'</del></p>';
        } else {
        echo '<p class="info-text price">&euro;'.$currentItem->prezzoPieno.'</p>';
        }
        ?> </div>
<div class="info"> Quantit&agrave: <?php echo $currentItem->quantita.' '.$currentItem->unitamisura?> </div>
<div class="add-cart">

  <button onclick="location.href='addtocart?cod=<?php echo $currentItem->idProdotto?>'" id="add-cart" alt="Aggiungi al carrello">
  <img src="../../public/img/addCart.png" alt="aggiungi al carrello" title="aggiungi al carrello"/>
  </button>
</div>
<div class="top-border"></div> <!-- SISTEMARE -->
<div class="prod-Info"><h4 class="prod-Info">Descrizione<h4>
<p class="info"> <?php echo $currentItem->descrizione ?> </p>
</div>
</div>

</div>

</div>
<?php require('partials/footer.php');?>
<?php endif; ?>
