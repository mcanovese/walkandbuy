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
    if(isset($_GET['action'])) $action = $_GET['action'];

require 'app/views/users.view.php';

}

public function admin(){
    $routeName = "admin";
    $this->onlyUser();
  $allUser = $this->UsersController->getAllCF();
require 'app/views/admin.view.php';

}

public function assegnaAzienda(){
    $routeName = "admin";
    $this->onlyUser();
    $userCF = Request::getPOST('cf');
    $this->UsersController->changeRole($userCF);
    header('Location: admin');

}


public function cart(){
    $routeName = "cart";
    $this->onlyUser();
    if(isset($_SESSION['cart'])) $data= $this->ItemsController->cartView();
    else $data=false;
    require 'app/views/cart.view.php';

}

public function order(){
    $routeName = "order";
    $this->onlyUser();

    $order = $this->ItemsController->getAllOrder();

    if(isset($_GET['orderid'])){
    $orderline = $this->ItemsController->getOrderLine($_GET['orderid']);


    foreach($orderline as $line){

      $linecomplete[]= array('item'=>$this->ItemsController->getItem($line->idprodotto));
    }



    }

    require 'app/views/order.view.php';

}



public function cassa(){
  $routeName = "cart";
  $this->onlyUser();
  $userID = $_SESSION['user']->idutente;
  if(isset($_SESSION['cart'])){
  $creaordine = $this->ItemsController->createNewOrder();
  $orderNumber= $this->ItemsController->getOrderNumber();
  $this->ItemsController->creaRigheOrdine($orderNumber);
    $result = $this->ItemsController->finalizeOrder($orderNumber,$userID);
}
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




public function category(){
  $this->SessionController->isAuthenticated();
  $routeName="category";
  $catID = (integer)$_GET['id'];

  $data = $this->ItemsController->catMainGroup($catID);
  $catName = $this->ItemsController->getCatName($catID);
require 'app/views/category.view.php';
}

public function singCat(){
  $this->SessionController->isAuthenticated();
  $routeName="singCat";
  $catID = (integer)$_GET['id'];

  $data = $this->ItemsController->getCategoryItem($catID);
  $catName = $this->ItemsController->getCatName($catID);
require 'app/views/singcat.view.php';
}




public function contact(){
    $routeName="contact";

require 'app/views/contact.view.php';
}

public function item() {
  $this->onlyUser();
  $userID =(int) $this->SessionController->getUserID();
  $user = $this->SessionController->getUser();
  if(isset($_GET['cod'])){
  $itemCod=$_GET['cod'];
  $currentItem = $this->ItemsController->getItem($itemCod);

  $itemID =(int) $currentItem->venditore;}
  $cat = $this->ItemsController->getAllCat();
  $um = $this->ItemsController->getAllUm();

  if(!isset($_GET['req'])&& !isset($_GET['cod'])) header("Location: 404");
  $routeName = 'item';
  if(isset($_GET['req']) && $_GET['req'] == "newItem"){
    $action = "newItem";
   return \Core\view('item',[ 'action' =>$action, 'routeName'=>'item', 'cat'=>$cat, 'um'=>$um]);

  }
  else {
    if(isset($_GET['req']) && $_GET['req']=='edit'){

    if($itemID != $userID && $user->azienda !=3) header("Location: 404");
    $action = 'edit';
    return \Core\view('item',[ 'action' =>$action,'currentItem'=> $currentItem, 'routeName'=>'item', 'cat'=>$cat, 'um'=>$um]);

    }

else {

  if($itemID == $userID || $user->azienda == 3  ) $edit = true;
  else $edit = false;

  return \Core\view('item', [
    'currentItem' => $currentItem, 'routeName' => 'item','edit'=>$edit
  ]);
      }

} }

public function addToCart(){
$this->onlyUser();
if(!isset($_GET['cod'])) header('Location: 404');
$idItem = $_GET['cod'];

if(isset($_GET['req']) && $_GET['req'] == 'dec'){
$cart = $this->SessionController->decreaseCartSession($idItem,1);

  header('Location: '.$_SERVER['HTTP_REFERER']);
}

else {
$qta = 1;
$cart = $this->SessionController->addSessionCart($idItem,$qta);
header('Location: '.$_SERVER['HTTP_REFERER']);}
}


public function addItem(){
    $this->onlyUser();
    $userID =  $userID = $_SESSION['user']->idutente;
    $itemName = Request::getPOST('itemName');
    $itemDesc = Request::getPOST('itemDesc');
    $itemPrice = Request::getPOST('itemPrice');
    $itemUM = Request::getPOST('itemUM');
    $itemDiscount = Request::getPOST('itemDiscount');
    $itemCat = Request::getPOST('itemCat');


    $itemQuantity = Request::getPOST('itemQuantity');


    $temp = explode(".", $_FILES["itemPhoto"]["name"]);

    $newfilename = round(microtime(true)) . '.' . end($temp);

    $dir = 'public/userimg/';
    move_uploaded_file($_FILES["itemPhoto"]["tmp_name"],$dir.$newfilename);

    $itemPhoto = $newfilename;

    if(!isset($itemDiscount)) $itemDiscount = 0;
  $insert = $this->ItemsController->insertItem($userID,$itemName,$itemDesc,$itemPrice,$itemUM,$itemPhoto,$itemDiscount,
  $itemCat,$itemQuantity);

  header('Location: home');
}

public function updateItem(){
$this->onlyUser();
$itemID = Request::getPOST('itemID');
$itemName = Request::getPOST('itemName');
$itemDesc = Request::getPOST('itemDesc');
$itemPrice = Request::getPOST('itemPrice');
$itemUM = Request::getPOST('itemUM');
$itemDiscount = Request::getPOST('itemDiscount');
$itemCat = Request::getPOST('itemCat');
$itemQuantity = Request::getPOST('itemQuantity');

if (file_exists($_FILES['itemPhoto']['tmp_name']) || is_uploaded_file($_FILES['itemPhoto']['tmp_name']))
{
$temp = explode(".", $_FILES["itemPhoto"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$dir = 'public/userimg/';
move_uploaded_file($_FILES["itemPhoto"]["tmp_name"],$dir.$newfilename);
$itemPhoto = $newfilename;
}else $itemPhoto = null;

$update = $this->ItemsController->setUpdateItem($itemID,$itemName,$itemDesc,$itemPrice,$itemUM,$itemPhoto,$itemDiscount,$itemCat,$itemQuantity);

if($update) header("Location: home");

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
  $via = Request::getPOST('via');
  $paese = Request::getPOST('paese');

  try{
  $result = $this->UsersController->insertUser(
    [
      'email' => $email,
      'cognome' => $cognome,
      'nome' => $nome,
      'codiceFiscale' => $codiceFiscale,
      'password' => $password,
      'verificaPassword' => $verificaPassword,
      'telefono' => $telefono,
      'via' => $via,
      'paese' => $paese
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
