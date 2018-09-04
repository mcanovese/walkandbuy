<?php
namespace App\Controller;
class UsersController{
public function index()
{
  require 'app/views/users.view.php';
}

public function __construct() {
  $this->database = \Core\App::get('database');

}


public function insertUser(array $parameters): bool {
  $email= $parameters['email'];
  $nome = $parameters['nome'];
  $cognome = $parameters['cognome'];
  $password = $parameters['password'];
  $verificaPassword = $parameters['verificaPassword'];
  $telefono = $parameters['telefono'];
  $codiceFiscale = $parameters['codiceFiscale'];
  $table = 'utenti';
  if ($password !== $verificaPassword) {
    throw new \Exception('pwdmatcherror');
  }

  $existing = $this->checkUserEmail($email);
  if ($existing) {
    throw new \Exception('maildbpresent');
  }

  $successful = $this->database->insert($table, [
    'cognome' => $cognome,
    'nome' => $nome,
    'cf' => $codiceFiscale,
    'telefono' => $telefono,
    'email' => $email,
    'password' => \password_hash($password, PASSWORD_DEFAULT),
  ]);

  return $successful;
}


//verifico l'esistenza di una mail già registrata
private function checkUserEmail(string $email) {
  $table = 'utenti';
  $where = 'email = :email';

  $exist = $this->database->selectWhere(
    $table,
    ['*'],
    $where,
    [':email' => $email]
  );

  if (count($exist) > 0) {
    return true;
  }

  return false;
}

}


?>
