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

public function notFound(){
    $routeName="404";
require 'app/views/404.view.php';

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

if(!isset($_GET['req'])&& !isset($_GET['cod'])) header("Location: 404");

  $routeName = 'item';
  if($_GET['req'] == "newItem"){
    $action = "newItem";
   return \Core\view('item',[ 'action' =>$action]);

  }
  else {
  $itemCod=$_GET['cod'];
  $currentItem = $this->ItemsController->getItem($itemCod);
  return \Core\view('item', [
    'currentItem' => $currentItem
  ]);
      }

}


public function addItem(){

    $itemName = Request::getPOST('itemName');
    $itemDesc = Request::getPOST('itemDesc');
    $itemPrice = Request::getPOST('itemPrice');
    $itemUM = Request::getPOST('itemUM');
    $itemPhoto = Request::getPOST('itemPhoto');
    $itemDiscount = Request::getPOST('itemDiscount');
    $itemCat = Request::getPOST('itemCat');
    $itemStock = Request::getPOST('itemStock');
    $itemStatus = Request::getPOST('itemStatus');

    // inizio-controlli integrità

      //todo

    //fine controlli integrità

    $insert = $this->ItemsController->insertItem($itemName,$itemDesc,$itemPrice,$itemUM,$itemPhoto,$itemDiscount,
  $itemCat,$itemStock,$itemStatus);

  if(!$insert)   {
    $action="insertFail";
    return \Core\view('item',[ 'action' =>$action]);}
else {
  $action="insertSuccess";
  return \Core\view('item',[ 'action' =>$action]);}

}



}
