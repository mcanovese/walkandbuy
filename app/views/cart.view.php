<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Carrello</h1>
<!-- LEGGERE IMPORTANTE
ogni riga deve avere un pulsante azione + e - per incrementare e decrementare
chiamata per aggiungere va fatta a :  /addtocart?cod=##  ##=nr idordine
/addtocart?cod=##req=dec invece va chiamata x decrementare di 1

tutte le operazioni di incremento e decremento hanno effetto sulla session[cart]
-->
<?php foreach($data as $item){
  if($item['item']->nome == null) continue;
echo"<br/>";
echo $item['item']->nome." ";
echo "Qta: ";
echo $item['qta'];
echo"<br/>";




} ?>


</div>
</div>
</div>
<?php require('partials/footer.php');?>
</div>
