<?php
namespace App\Models;

class User{

  public $idUtente;
  public $cognome;
  public $nome;
  public $codiceFiscale;
  public $telefono;
  public $email;

  private $password;

  public function __construct(

    string $idutente,
    string $cognome,
    string $nome,
    string $cf,
    string $telefono,
    string $email ){


      $this->idutente = $idutente;
      $this->cognome = $cognome;
      $this->nome = $nome;
      $this->cf = $cf;
      $this->telefono = $telefono;
      $this->email = $email;
    }

    public function getPassword(): string {
      return $this->password;
    }









}
