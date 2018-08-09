<?php

namespace App\Controller;

class PagesController{




}

public function __construct(){  //costruttore




}

//creare una funzione per ogni pagina, utilizzata poi in routes per
// caricare la view (esempio root -> Router carica controller pages -> carica view home)
public function home(){

require 'views/index.view.php';


}


 ?>
