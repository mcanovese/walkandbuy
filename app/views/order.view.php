<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<?php if(isset($_GET['req']) && $_GET['req']=='show'): ?>

<?php

echo"Dettagli Ordine";
echo"Elenco Articoli<br>";
if(isset($linecomplete)){
foreach($linecomplete as $line){
echo $line['item']->idProdotto.'</br>';
echo $line['item']->nome.'</br>';
}
}




?>


<?php require('partials/footer.php');?>
<?php else : ?>
<h1 class="title">Elenco Ordini Utente</h1>
<?php

if(isset($_GET['result'])) echo "<h1 class='message'>Ordine Inserito con Successo</h1>";

if(isset($order)){
foreach($order as $ordine){
echo"<div class='order-container'>";
echo "<label class='label-detail'>ID</label><div class='data'>".$ordine->idordine."</div>";
echo "<label class='label-detail'>Data</label><div class='data'>".$ordine->dataordine."</div>";
echo "<label class='label-detail'>Totale Euro</label><div class='data'>".$ordine->totaleordine."</div>";
echo "<label class='label-detail'>Stato</label><div class='data'>".$ordine->statoordine."</div>";
echo "<label class='label-detail'>Metodo Pagamento </label><div class='data'>".$ordine->metodopagamento."</div>";
echo "<label class='label-detail'>Metodo Spedizione </label><div class='data'>".$ordine->metodospedizione."</div>";
echo "<a class='detail' href='order?req=show&orderid=".$ordine->idordine."'>Dettagli Ordine</a>";
echo"</div>";

}} else echo"<h1 class ='message'>Nessun ordine ancora effettuato</h1>";


?>



</div>




<?php require('partials/footer.php');?>
<?php endif; ?>
</div>
