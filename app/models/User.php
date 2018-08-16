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

    string $idUtente,
    string $cognome,
    string $nome,
    string $codiceFiscale,
    string $telefono,
    string $email, ){


      $this->idUtente = $idUtente;
      $this->cognome = $cognome;
      $this->nome = $nome;
      $this->codiceFiscale = $codiceFiscale;
      $this->telefono = $telefono;
      $this->email = $email;
    }

    public function getPassword(): string {
      return $this->password;
    }










}
