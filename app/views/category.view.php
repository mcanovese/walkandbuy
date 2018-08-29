<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Categoria <?php echo $catName; ?></h1>


<?php


foreach ($data as $articolo){
echo"<div>";
echo $articolo->nome.'</br>';
echo $articolo->descrizione.'</br>';
echo $articolo->prezzoPieno.'</br>';
echo $articolo->unitaMisura.'</br>';
echo $articolo->foto.'</br>';
echo $articolo->percentualeSconto.'</br>';
echo '</br>';



echo"</div>";

}



 ?>








</div>
<?php require('partials/footer.php');?>
</div>
