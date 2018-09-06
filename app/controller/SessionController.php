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


    $user = $this->getUserByCredentials($email, $password);

    if ($user !== null) {
      Session::start();
      Session::set('user', new User($user->idutente, $user->cognome, $user->nome, $user->cf, $user->telefono,$user->email));

    }

    return $user !== null;
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
}
