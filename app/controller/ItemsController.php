<?php
//items controllers


namespace App\Controller;
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
    $where='articoli.idprodotto = :idprodotto';
    $parameters[':idprodotto'] = $idProdotto;
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


  public function getCategoryItem(int $categoryID) {
    $table = 'articoli';
    $where='articoli.categoria = :categoria';
    $parameters[':categoria'] = $categoryID;
    $result = $this->database->selectWhere(
      $table,
      ['*'],
      $where,
      $parameters
    );
    $categorygroup = array();
    foreach($result as $articolo){
      $categorygroup[] = $this->createItem($articolo);
    }

    return $categorygroup;


  }







  private function createItem($result): Articolo {
    return new Articolo(
      $result->idprodotto,
      $result->nome,
      $result->descrizione,
      $result->prezzopieno,
      $result->unitamisura,
      $result->foto,
      $result->percentualesconto,
      $result->categoria,
      $result->giacenza,
      $result->abilitato,
      $result->venditore);
  }

  public function insertItem(string $itemName,string $itemDesc,string $itemPrice,string $itemUM,string $itemPhoto,string $itemDiscount,
string $itemCat,string $itemStock,string $itemStatus): bool {
//controllo necessario

    $table = 'articoli';

    if (1==1) {
      return $this->database->insert($table, [
        'nome' => $itemName,
        'descrizione' => $itemDesc,
        'prezzopieno' => $itemPrice,
        'unitamisura' => 1,
        'foto' => $itemPhoto,
        'percentualesconto' => $itemDiscount,
        'categoria' => $itemCat,
        'giacenza' => $itemStock,
        'abilitato' => $itemStatus,
        'venditore' => 1

      ]);
    } else {
      return false;
    }
  }












}


 ?>
