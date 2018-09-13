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
  $via = $parameters['via'];
  $paese = $parameters['paese'];
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
    'via'=>$via,
    'paese' => $paese,
    'password' => \password_hash($password, PASSWORD_DEFAULT),
  ]);

  return $successful;
}

public function updateUser(array $parameters):bool {

  $userID = $parameters['userID'];
  $email= $parameters['email'];
  $nome = $parameters['nome'];
  $cognome = $parameters['cognome'];
  $password = $parameters['password'];
  $verificaPassword = $parameters['verificaPassword'];
  $telefono = $parameters['telefono'];
  $codiceFiscale = $parameters['codiceFiscale'];
  $via = $parameters['via'];
  $paese = $parameters['paese'];
  $table = 'utenti';
  if ($password !== $verificaPassword) {
    throw new \Exception('pwdmatcherror');
  }


  $changes = 'cognome = :cognome,
              nome = :nome,
              cf = :cf,
              telefono = :telefono,
              via = :via,
              paese = :paese,
              email = :email,
              password = :password';
              
  $where = 'idutente = :idutente';


  $updateordine = $this->database->update('utenti', $changes, $where, [
    ':idutente' => $userID,
    ':cognome' => $cognome,
    ':nome' => $nome,
    ':cf' =>$codiceFiscale,
    ':telefono' => $telefono,
    ':via'=>$via,
    ':paese'=>$paese,
    ':email' =>$email,
    ':password' => \password_hash($password, PASSWORD_DEFAULT),
  ]);

  return $updateordine;





}







public function getifAzienda ($userCF){

  $table = 'utenti';
  $where='utenti.cf = :cf';
  $parameters[':cf'] = $userCF;
  $result = $this->database->selectWhere(
    $table,
    ['*'],
    $where,
    $parameters
  );

  return $result[0]->azienda;

}


public function getAllCF(){
  $table = 'utenti';
  $result = $this->database->selectAll($table);

  return $result;
}


public function changeRole ($userCF){

  $status = $this->getifAzienda($userCF);

  $changes = 'azienda = :azienda';
  $where = 'cf = :cf';

   if($status == 0){
  $updateordine = $this->database->update('utenti', $changes, $where, [
    ':azienda' => 1,
    ':cf'=>$userCF
  ]); }

  if($status == 1){
 $updateordine = $this->database->update('utenti', $changes, $where, [
   ':azienda' => 0,
   ':cf'=>$userCF
 ]); }





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
