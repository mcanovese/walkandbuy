<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Categoria -> <?php echo $catName; ?></h1>


<?php


foreach ($data as $articolo){
echo "<div class='category-item'>";
echo "<div class='little-img'>";
echo "<a href='/item?cod=".$articolo->idProdotto."'>";
echo '<img src="../../public/img/product/'.$articolo->foto.'.jpg'.'" alt="'.$articolo->nome.'" title="'.$articolo->nome.'"/> ';
echo "</a>";
echo "</div>";
echo '<p class="info-text">'.$articolo->nome.'</p>';
echo '<p class="info-text">'.$articolo->descrizione.'</p>';
echo '<p class="info-text">'.$articolo->prezzoPieno.'</p>';
echo '<p class="info-text">'.$articolo->unitaMisura.'</p>';
echo '<p class="info-text">'.$articolo->foto.'</p>';
echo '<p class="info-text">'.$articolo->percentualeSconto.'</p>';
echo "</div>";

}



 ?>
</div>
<?php require('partials/footer.php');?>
</div>
