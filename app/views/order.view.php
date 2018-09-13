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
<h1>Elenco Ordini Utente</h1>
<?php

if(isset($order)){
foreach($order as $ordine){
echo"<div>";
echo "ID :".$ordine->idordine."<br/>";
echo "Data :".$ordine->dataordine."<br/>";
echo "Totale Euro :".$ordine->totaleordine."<br/>";
echo "Stato :".$ordine->statoordine."<br/>";
echo "Metodo Pagamento :".$ordine->metodopagamento."<br/>";
echo "Metodo Spedizione :".$ordine->metodospedizione."<br/>";
echo "<a href='order?req=show&orderid=".$ordine->idordine."'>Dettagli Ordine</a>";
echo"</div>";

}} else echo"<h1 class ='title'>Nessun ordine ancora effettuato</h1>";


?>



</div>




<?php require('partials/footer.php');?>
<?php endif; ?>
</div>
