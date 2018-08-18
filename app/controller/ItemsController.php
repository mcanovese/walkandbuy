<?php
//items controllers


namespace App\Controllers;
use Core\App;
use Core\Request;

use \App\Models\Articolo;
require_once 'app/models/Articolo.php';

class ItemsController {

  private $database;

  public function __construct() {
    $this->database = \Core\App::get('database');

  }


  public function getItem(int $idProdotto): Articolo {
    $table = 'articoli';
    $where='articolo.idprodotto = :idprodotto';
    $parameters[':idprodotto'] = $idprodotto;
    $result = $this->database->selectWhere(
      $table,
      ['*'],
      $where,
      $parameters
    );

    return $this->createItem($result[0]);
    //passo array result (query db) a funzione createItem, che mi restituisce un articolo
    // ben formato che viene restituito dal return.
  }



  private function createItem($result): Articolo {
    return new Articolo(
      $result->idprodotto,
      $result->nome,
      $result->descrizione,
      $result->prezzoPieno,
      $result->unitaMisura,
      $result->foto,
      $result->percentualeSconto;
      $result->categoria,
      $result->giacenza,
      $result->abilitato,
      $result->venditore
    );
  }


}


 ?>
