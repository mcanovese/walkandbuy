
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

<?php if($action == "newItem") :?> <!-- inserimento nuovo articolo -->
<h1>Inserimento Nuovo Articolo</h1>
<p>Completa il form per effettuare l'inserimento di un articolo nel tuo inventario</p>

<form action="insertItem" method="post">

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

  <button type="submit" class="btn btn-outline">Inserisci Articolo</button>



</form>





<?php else : var_dump($currentItem);?>
<div class="col-img">
COLONNA IMMAGINE
</div>
<div class="col-text">
COLONNA TESTO
</div>
  <!-- //var_dump da rimuovere / usare solo x vedere voci array -->
<?php endif; ?>
</div>



<?php require('partials/footer.php');?>
