<?php

namespace App\Controller;

class PagesController{

//creare una funzione per ogni pagina, utilizzata poi in routes per
// caricare la view (esempio root -> Router carica controller pages -> carica view home)
public function home(){
require 'app/views/index.view.php';

}

public function about(){
require 'app/views/about.view.php';
}

public function aboutculture(){
require 'app/views/about-culture.view.php';
}

public function adduser(){
require 'app/views/adduser.view.php';
}

public function contact(){
require 'app/views/contact.view.php';
}



}
