<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Carrello</h1>

<?php foreach($data as $item){

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
