<?php
namespace App\Models;

class User{

  public $idutente;
  public $cognome;
  public $nome;
  public $cf;
  public $telefono;
  public $email;
  public $azienda;
  public $via;
  public $paese;

  private $password;

  public function __construct(

    string $idutente,
    string $cognome,
    string $nome,
    string $cf,
    string $telefono,
    string $email,
    int $azienda,
    string $via,
    string $paese){


      $this->idutente = $idutente;
      $this->cognome = $cognome;
      $this->nome = $nome;
      $this->cf = $cf;
      $this->telefono = $telefono;
      $this->email = $email;
      $this->azienda = $azienda;
      $this->via = $via;
      $this->paese = $paese;
    }

    public function getPassword(): string {
      return $this->password;
    }









}
