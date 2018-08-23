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
  $codiceFiscale = $parameters['codiceFiscale'];
  $password = $parameters['password'];
  $passwordConfirm = $parameters['passwordConfirm'];
  $nome = $parameters['nome'];
  $cognome = $parameters['cognome'];
  $role = $parameters['role'];
  $table = $this->getRoleTable($role);

  if ($password !== $passwordConfirm) {
    throw new \Exception('passwordsNotEqual');
  }

  // Check if the user already exists
  $existing = $this->checkUserCf($codiceFiscale, $role);
  if ($existing) {
    throw new \Exception('alreadyExisting');
  }

  $successful = $this->database->insert($table, [
    'codice_fiscale' => $codiceFiscale,
    'password_hash' => \password_hash($password, PASSWORD_DEFAULT),
    'nome' => $nome,
    'cognome' => $cognome,
  ]);

  if ($role === 'inspector') {
    // Inspector must be added also the 'ispettore' table
    $succ = $this->database->insert('ispettore', [
      'codice_fiscale' => $codiceFiscale
    ]);

    return $succ && $successful;
  }

  return $successful;
}






}









?>
