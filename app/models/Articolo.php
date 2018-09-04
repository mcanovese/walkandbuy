<?php
namespace App\Models;

class Articolo{

  public $idProdotto;
  public $nome;
  public $descrizione;
  public $prezzoPieno;
  public $unitaMisura;
  public $foto;
  public $percentualeSconto;
  public $categoria;
  public $giacenza;
  public $abilitato;
  public $venditore;
  public $quantita;



public function __construct(
  string $idProdotto,
  string $nome,
  string $descrizione,
  string $prezzoPieno,
  string $unitaMisura,
  string $foto,
  string $percentualeSconto,
  string $categoria,
  string $giacenza,
  string $abilitato,
  string $venditore,
  string $quantita
){

    $this->idProdotto = $idProdotto;
    $this->nome = $nome;
    $this->descrizione = $descrizione;
    $this->prezzoPieno = $prezzoPieno;
    $this->unitaMisura = $unitaMisura;
    $this->foto = $foto;
    $this->percentualeSconto = $percentualeSconto;
    $this->categoria = $categoria;
    $this->giacenza = $giacenza;
    $this->abilitato = $abilitato;
    $this->venditore = $venditore;
    $this->quantita = $quantita;

  }


}



 ?>
