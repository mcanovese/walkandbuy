
<?php require('partials/head.php');?>


<?php
/*
View dedicata ad un singolo articolo.
l'array currentItem fornisce tutti i campi di un singolo articolo forniti dal db
di seguito il var_dump dell'array con un articolo demo dove si possono visualizzare
le voci dell'array


object(App\Models\Articolo)#7 (11) { ["idProdotto"]=> string(1) "1"
 ["nome"]=> string(4) "Mela" ["descrizione"]=> string(12) "Mela Succosa"
 ["prezzoPieno"]=> string(1) "1" ["unitaMisura"]=> string(1) "1"
 ["foto"]=> string(1) "a" ["percentualeSconto"]=> string(1) "0"
 ["categoria"]=> string(1) "1" ["giacenza"]=> string(1) "1"
["abilitato"]=> string(1) "1" ["venditore"]=> string(1) "1" }
*/

var_dump($currentItem);  //var_dump da rimuovere / usare solo x vedere voci array
 ?>
<?php require('partials/footer.php');?>
