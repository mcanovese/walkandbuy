<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1 class="title">Carrello</h1>
<!-- LEGGERE IMPORTANTE
ogni riga deve avere un pulsante azione + e - per incrementare e decrementare
chiamata per aggiungere va fatta a :  /addtocart?cod=##  ##=nr idordine
/addtocart?cod=##&req=dec invece va chiamata x decrementare di 1

tutte le operazioni di incremento e decremento hanno effetto sulla session[cart]

NOTA:
x confermare l'ordine serve un pulsante di conferma, che effettua una chiamata Alla
pagina "checkout", la quale poi richiamerà la view di cart per l'output della conferma
ordine
-->
<?php
echo"<div class='content'>";
if(!$data) echo "<span class='empty-cart'>Il tuo carrello si sente solo :(</span>";
else {
foreach($data as $item){
  if($item['item']->nome == null) continue;
echo "<div class='prod-container'>";
echo "<div class='img-box'>";
echo '<img src="../../public/userimg/'.$item['item']->foto.'" alt="'.$item['item']->nome.'" title="'.$item['item']->nome.'"/> ';
echo "</div>";
echo "<div class='product-info'>";
echo "<div class='label-detail'>";
echo "<a href='/item?cod=".$item['item']->idProdotto."'>";
echo $item['item']->nome;
echo "</a>";
echo "</div>";
echo "<div class='data'>";
echo "Qta: ";
echo $item['qta'];
echo "</div>";
echo "</div>";
echo "<div class='add-remove'>";
echo "<span class='add'>
      <a href='/addtocart?cod=".$item['item']->idProdotto."'>
      <img src='../../public/img/plus.png'>
      </a>
      </span>";
echo "<span class='remove'>
      <a href='/addtocart?cod=".$item['item']->idProdotto."&req=dec'>
      <img src='../../public/img/minus.png'>
      </a>
      </span>";
echo "</div>";
echo "</div>";
}

echo"<a class='btn btn-outline' href='cassa'/>Procedi con l'acquisto</a>";
echo "</div>";



} ?>



</div>
<?php require('partials/footer.php');?>
</div>
