<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<?php if(isset($_GET['req']) && $_GET['req']=='show'): ?>

<?php

echo"<h1 class='title'>Dettagli Ordine</h1>";

if(isset($linecomplete)){
foreach($linecomplete as $line){
    echo "<div class='order-container'>";
    echo "<div class='img-box'>";
    echo '<img src="../../public/userimg/'.$line['item']->foto.'" alt="'.$line['item']->nome.'" title="'.$line['item']->nome.'"/> ';
    echo "</div>";
    echo "<div class='product-info'>";
    echo "<div class='prod-name'>";
    echo "<a href='/item?cod=".$line['item']->idProdotto."'>";
    echo $line['item']->nome;
    echo "</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
}
?>
</div>

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
