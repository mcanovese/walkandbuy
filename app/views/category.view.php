<?php require('partials/head.php');?>
<h1>Categoria Singola</h1>


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









<?php require('partials/footer.php');?>
