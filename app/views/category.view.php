<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Categoria -> <?php echo $catName; ?></h1>


<div class="category-container">
<?php

foreach ($data as $articolo){
    $prezzoPieno=$articolo->prezzoPieno;
echo "<div class='category-item'>";
echo "<div class='little-img-container'>";
echo "<a href='/item?cod=".$articolo->idProdotto."'>";
echo '<img class="little-img" src="../../public/img/product/'.$articolo->foto.'.jpg'.'" alt="'.$articolo->nome.'" title="'.$articolo->nome.'"/> ';
echo "</a>";
echo "</div>";
echo "<div class='info-container'>";
echo '<p class="info-text name">'.$articolo->nome.'</p>';
if ($articolo->percentualeSconto>0){
    $price=$prezzoPieno-(($prezzoPieno*$articolo->percentualeSconto)/100);
echo '<p class="info-text price">&euro;'.$price.'</p>';
echo '<p class="info-text discount">-'.$articolo->percentualeSconto.'&#37;&nbsp;|
<del class="full-price striked">&euro;'.$articolo->prezzoPieno.'</del></p>';
} else {
echo '<p class="info-text price">&euro;'.$articolo->prezzoPieno.'</p>';
}
echo '<p class="info-text um">'.$articolo->unitaMisura.'</p>';
echo "</div>";


echo "<a href='#'>";
echo '<div class="add-foot">';
echo '<img src="../../public/img/aggiungiCar.png"/>';
echo "</div>";
echo "</a>";
echo "</div>";
}
 ?>

</div>


</div>
<?php require('partials/footer.php');?>
</div>
