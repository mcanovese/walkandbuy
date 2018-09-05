<div id="container">
<?php require('partials/head.php');?>



<!--
View dedicata ad un singolo articolo.
l'array currentItem fornisce tutti i campi di un singolo articolo forniti dal db
di seguito il var_dump dell'array con un articolo demo dove si possono visualizzare
le voci dell'array

COMMENTO DA ELIMINARE / SOLO DI AIUTO X CSS
object(App\Models\Articolo)#7 (11) { ["idProdotto"]=> string(1) "1"
 ["nome"]=> string(4) "Mela" ["descrizione"]=> string(12) "Mela Succosa"
 ["prezzoPieno"]=> string(1) "1" ["unitaMisura"]=> string(1) "1"
 ["foto"]=> string(1) "a" ["percentualeSconto"]=> string(1) "0"
 ["categoria"]=> string(1) "1" ["giacenza"]=> string(1) "1"
["abilitato"]=> string(1) "1" ["venditore"]=> string(1) "1" }
*/
-->

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
    <label class="input-label" for="nome">Unit&agrave Misura //da sistemare</label>
    <input class="input" id="itemUM"  type="text" name="itemUM" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Carica Foto</label>
    <input class="input" id="itemPhoto"  type="text" name="itemPhoto" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Sconto</label>
    <input class="input" id="itemDiscount"  type="text" name="itemDiscount" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Categoria //da sistemare</label>
    <input class="input" id="itemCat"  type="text" name="itemCat" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Giacenza</label>
    <input class="input" id="itemCat"  type="text" name="itemStock" required />
    <span class="underline"></span>
  </div>

  <div class="loginbox-field">
    <label class="input-label" for="nome">Abilitato</label>
    <input class="input" id="itemCat"  type="text" name="itemStatus" required />
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

<div class="split col-text"> <!-- COLONNA DEL TESTO, CON DETTAGLI-->
<div class="prod-name">
  <h2><?php echo $currentItem->nome; ?><h2>
</div>
<div class="info"> Prezzo: <?php echo $currentItem->prezzoPieno?>&euro; </div>
<div class="info"> Quantit&agrave <?php echo $currentItem->quantita.' '.$currentItem->unitamisura?> </div>
<div class="add-cart">
  <button onclick="addCart()" id="add-cart" title="Aggiungi al carrello">
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
<?php endif; ?>
</div>
</div>
<?php require('partials/footer.php');?>
