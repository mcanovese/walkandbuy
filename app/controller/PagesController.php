<?php

namespace App\Controller;
use Core;
use Core\App;
use Core\Request;

require_once 'app/controller/ItemsController.php';
require_once 'app/controller/UsersController.php';
require_once 'app/controller/SessionController.php';


class PagesController{

  public function __construct() {
    $this->ItemsController = new ItemsController();
    $this->UsersController = new UsersController();
    $this->SessionController  = new SessionController();
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


require 'app/views/adduser.view.php';



    }


public function signIn(){
    $routeName="signIn";
require 'app/views/signIn.view.php';
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


public function registerUser(){
  //acquisizione dati da POST
  $email = Request::getPOST('email');
  $cognome = Request::getPOST('cognome');
  $nome = Request::getPOST('nome');
  $codiceFiscale = Request::getPOST('cf');
  $password = Request::getPOST('password');
  $verificaPassword = Request::getPOST('verificaPassword');
  $telefono = Request::getPOST('telefono');

  try{
  $result = $this->UsersController->insertUser(
    [
      'email' => $email,
      'cognome' => $cognome,
      'nome' => $nome,
      'codiceFiscale' => $codiceFiscale,
      'password' => $password,
      'verificaPassword' => $verificaPassword,
      'telefono' => $telefono
    ]);
      }catch (\Exception $e) {
        
          if ($e->getMessage() === 'pwdmatcherror')    { return \Core\view('adduser',[ 'messageDisplay' =>'Le password che hai inserito non sono uguali', 'routeName' => 'addUser']);}
          else {if ($e->getMessage() === 'maildbpresent')   return \Core\view('adduser',[ 'messageDisplay' =>'La mail inserita &egrave gi&agrave presente nel database', 'routeName' => 'addUser']);
          }
      }
  }


  public function loginPOST() {
    $email = Request::getPOST('email');
    $password = Request::getPOST('password');

    $isAuthenticated = $this->SessionController->authenticate($email, $password);

    if ($isAuthenticated) return \Core\view('item');
    else return \Core\view('item');

  }
}
