<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1 class="title">Categoria -> <?php echo $catName; ?></h1>
<div>

<?php

foreach($data as $id => $category) {
    echo '<div class="go-subcat-container">';
    echo "<div class='subcat-name'>";
    echo '<button onclick="#" class="go-subcat" alt="Scoprili tutti">';
    echo '<img class="go-subcat-img" src="../../public/img/go_subcat.png" alt="Scoprili tutti" /></button>';
    echo "<h3>";
    echo $category['catName'];
    echo "</h3>";
    echo '</div>';
    echo '</div>';
  echo '<div class="category-container">';
    foreach($category['items'] as $articolo)
    {
        $prezzoPieno=$articolo->prezzoPieno;
        echo "<div class='category-item'>";
        echo "<div class='little-img-container'>";
        echo "<a href='/item?cod=".$articolo->idProdotto."'>";
        /*echo '<img class="little-img" src="../../public/img/product/'.$articolo->foto.'.jpg'.'" alt="'.$articolo->nome.'" title="'.$articolo->nome.'"/> ';
        */
        echo '<img class="little-img" src="../../public/userimg/'.$articolo->foto.'" alt="'.$articolo->nome.'" title="'.$articolo->nome.'"/> ';
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
        echo '<p class=" quantity">'.$articolo->quantita.' '.$articolo->unitaMisura.'</p>';
        echo "</div>";


        echo "<a href='addtocart?cod=".$articolo->idProdotto."'>";
        echo '<div class="add-foot">';
        echo '<img src="../../public/img/aggiungiCar.png"/>';
        echo "</div>";
        echo "</a>";
        echo "</div>";

       }
       echo "</div>";
    }
 ?>
</div>
</div>

<?php require('partials/footer.php');
?>
</div>
