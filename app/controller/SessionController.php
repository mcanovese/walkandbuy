<?php

namespace App\Controller;

use \Core\Session;
use \App\Models\User;


require_once 'app/models/User.php';


class SessionController {
  /**
   * QueryBuilder instance
   *
   * @var \Core\Database\QueryBuilder
   */
  private $database;

  public function __construct() {
    $this->database = \Core\App::get('database');
  }

  public function authenticate($email, $password): bool {
    $userClass = '\App\models\User';

    $user = $this->getUserByCredentials($email, $password);

    if ($user !== null) {
      Session::start();

      Session::set('user', new $userClass($user->idutente, $user->cognome, $user->nome, $user->cf, $user->telefono,$user->email));

    }

    return $user !== null;
  }

  public function sessionStart(){
    Session::start();
  }

  public function getUser() {
    return Session::get('user');
  }


  public function isAuthenticated(): bool {
    return $this->getUser() !== null;
  }

  public function logout() {
    Session::destroy();
  }

  function getUserByCredentials($email, $password) {
    $tabella='utenti';

    $results = $this->database->selectWhere(
      $tabella,
      ['idutente','cognome', 'nome', 'cf', 'telefono','password','email'],
      'email = :email',
      [':email' => $email]
    );


    if (\count($results) !== 1) return null;
    else {
      $user = $results[0];
      $isAuthorized = \password_verify($password, $user->password);

      if($isAuthorized) return $user;
      else return null;

    }
  }

  public function checkPassword($codiceFiscale, $password) {

    $results = $this->database->selectWhere(
      'utenti',
      ['email', 'password', 'nome', 'cognome'],
      'email = :email',
      [':email' => $email]
    );

    if (\count($results) !== 1) return null;
    else {
      $user = $results[0];
      $isAuthorized = \password_verify($password, $user->password);

      return $isAuthorized;
    }
  }

public function addSessionCart($itemID,$qta){
  $cart = array();
  $cart = Session::get('cart');
  if(!isset($cart)){
    $item = (['itemID' -> $itemID,
    'qta' -> $qta ]);
    array_push($cart,$item);

    Session::set('cart',$cart);
  }

  if(isset($cart)){

if(in_array($itemID,$cart)){
    foreach($cart as $a){
      if($a['itemID'] == $itemID) $a['qta'] == $a['qta'] + $qta;
    }
  } else {
    $item = (['itemID' -> $itemID,
    'qta' -> $qta ]);
    array_push($cart,$item);
  }
}

return $cart;

}











}
