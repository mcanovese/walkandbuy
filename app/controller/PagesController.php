<?php

namespace App\Controller;
use Core\App;
use Core\Request;

class PagesController{

//creare una funzione per ogni pagina, utilizzata poi in routes per
// caricare la view (esempio root -> Router carica controller pages -> carica view home)
public function home(){
    $routeName="home";
require 'app/views/index.view.php';

}

public function whoAreWe(){
    $routeName="whoAreWe";
require 'app/views/whoAreWe.view.php';
}
public function partner(){
    $routeName="partner";
require 'app/views/partner.view.php';
}

public function howWork(){
    $routeName="howWork";
require 'app/views/howWork.view.php';
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
