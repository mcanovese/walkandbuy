<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Carrello</h1>
<!-- LEGGERE IMPORTANTE
ogni riga deve avere un pulsante azione + e - per incrementare e decrementare
chiamata per aggiungere va fatta a :  /addtocart?cod=##  ##=nr idordine
/addtocart?cod=##req=dec invece va chiamata x decrementare di 1

tutte le operazioni di incremento e decremento hanno effetto sulla session[cart]

NOTA:
x confermare l'ordine serve un pulsante di conferma, che effettua una chiamata Alla
pagina "checkout", la quale poi richiamerà la view di cart per l'output della conferma
ordine
-->
<?php

if(!$data) echo "niente nel carrello";
else {
foreach($data as $item){
  if($item['item']->nome == null) continue;
echo"<br/>";
echo $item['item']->nome." ";
echo "Qta: ";
echo $item['qta'];
echo"<br/>";}

echo"<a href='cassa'/>Procedi conferma ordine</a>";



} ?>


</div>
</div>
</div>
<?php require('partials/footer.php');?>
</div>
