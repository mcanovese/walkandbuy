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

public function globalsUser(){
  $logeduser = $this->SessionController->getUser();
  $GLOBALS['utente'] = $logeduser;
}


public function home(){
    $routeName="home";
    $this->SessionController->isAuthenticated();
require 'app/views/index.view.php';

}

public function notFound(){
    $routeName="404";
$this->SessionController->isAuthenticated();
require 'app/views/404.view.php';

}

public function whoAreWe(){
    $routeName="whoAreWe";
$this->SessionController->isAuthenticated();
require 'app/views/whoAreWe.view.php';
}
public function partner(){
    $routeName="partner";
$this->SessionController->isAuthenticated();
require 'app/views/partner.view.php';
}

public function howWork(){
    $routeName="howWork";
$this->SessionController->isAuthenticated();
require 'app/views/howWork.view.php';
}

public function addUser(){
    $routeName="addUser";
$this->SessionController->isAuthenticated();
require 'app/views/adduser.view.php';
    }

public function user(){
    $routeName = "user";
    $this->onlyUser();
    $user = $this->SessionController->getUser();

require 'app/views/users.view.php';

}

public function cart(){
    $routeName = "cart";
    $this->onlyUser();
    $data= $this->ItemsController->cartView();



require 'app/views/cart.view.php';

}


public function signIn(){
    $routeName="signIn";
$this->SessionController->isAuthenticated();
require 'app/views/signIn.view.php';
}

public function logout(){
  $routeName="logout";
$this->SessionController->isAuthenticated();
$this->SessionController->logout();
$logout=true;
require 'app/views/signIn.view.php';
}


/*
public function category(){
  $this->SessionController->isAuthenticated();
  $routeName="category";
  $catID = (integer)$_GET['id'];
  $data = $this->ItemsController->getCategoryItem($catID);
  $catName = $this->ItemsController->getCatName($catID);



require 'app/views/category.view.php';
}*/

public function category(){
  $this->SessionController->isAuthenticated();
  $routeName="category";
  $catID = (integer)$_GET['id'];
  $data = $this->ItemsController->catMainGroup($catID);
  $catName = $this->ItemsController->getCatName($catID);
  $order = $this->ItemsController->creaRigheOrdine();

require 'app/views/category.view.php';
}





public function contact(){
    $routeName="contact";

require 'app/views/contact.view.php';
}

public function item() {
  $this->onlyUser();

if(!isset($_GET['req'])&& !isset($_GET['cod'])) header("Location: 404");

  $routeName = 'item';
  if(isset($_GET['req']) && $_GET['req'] == "newItem"){
    $action = "newItem";
    $cat = $this->ItemsController->getAllCat();
    $um = $this->ItemsController->getAllUm();
   return \Core\view('item',[ 'action' =>$action, 'routeName'=>'item', 'cat'=>$cat, 'um'=>$um]);

  }
  else {

  $itemCod=$_GET['cod'];
  $currentItem = $this->ItemsController->getItem($itemCod);
  return \Core\view('item', [
    'currentItem' => $currentItem, 'routeName' => 'item'
  ]);
      }

}

public function addToCart(){
$this->onlyUser();
$idItem = $_GET['cod'];
if(isset($_GET['req']) && $_GET['req'] == 'dec'){
  $cart = $this->SessionController->decreaseCartSession($idItem,1);
  var_dump($_SESSION['cart']);
  require 'app/views/test.view.php';
}else {

$qta = 1;
$cart = $this->SessionController->addSessionCart($idItem,$qta);
var_dump($_SESSION['cart']);
require 'app/views/test.view.php';}
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
    $itemQuantity = Request::getPOST('itemQuantity');

    // inizio-controlli integrità

      //todo

    //fine controlli integrità

  $insert = $this->ItemsController->insertItem($itemName,$itemDesc,$itemPrice,$itemUM,$itemPhoto,$itemDiscount,
  $itemCat,$itemStock,$itemStatus,$itemQuantity);

  if(!$insert)   {
    $action="insertFail";
    return \Core\view('item',[ 'action' =>$action]);}
else {
  $action="insertSuccess";
  return \Core\view('item',[ 'action' =>$action]);}

}


public function registerUser(){
    $this->SessionController->isAuthenticated();
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

    if(isset($result))
    {return \Core\view('adduser',[ 'result' =>'true', 'routeName' => 'addUser']);}

  }


  public function loginPOST() {
    $email = Request::getPOST('email');
    $password = Request::getPOST('password');

    $isAuthenticated = $this->SessionController->authenticate($email, $password);

    if ($isAuthenticated) return \Core\view('index');
    else return \Core\view('404');

  }

  private function onlyUser() {
    if (!$this->SessionController->isAuthenticated()) {
      header("Location: /signin");
      exit;
    }
  }






}
