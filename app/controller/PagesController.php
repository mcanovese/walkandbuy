<?php

namespace App\Controller;

class PagesController{

//creare una funzione per ogni pagina, utilizzata poi in routes per
// caricare la view (esempio root -> Router carica controller pages -> carica view home)
public function home(){
    $routeName="home";
require 'app/views/index.view.php';

}

public function about(){
    $routeName="about";
require 'app/views/about.view.php';
}

public function aboutculture(){
    $routeName="aboutCulture";
require 'app/views/about-culture.view.php';
}

public function addUser(){
    $routeName="addUser";
require 'app/views/addUser.view.php';
}

public function contact(){
    $routeName="contact";
require 'app/views/contact.view.php';
}



}
