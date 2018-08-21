<?php

namespace App\Controller;
use Core\App;
use Core\Request;

require_once 'app/controller/ItemsController.php';
require_once 'app/controller/UsersController.php';


class PagesController{

  public function __construct() {
    $this->ItemsController = new ItemsController();
    $this->UsersController = new UsersController();
  }

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

public function item() {
//   $this->protectRoute();

  $routeName = 'item';
  $itemCod=$_GET['cod'];
  $currentItem = $this->ItemsController->getItem($itemCod);
  return \Core\view('item', [
    'currentItem' => $currentItem
  ]);




}



}
