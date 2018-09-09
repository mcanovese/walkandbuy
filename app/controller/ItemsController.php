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
    if(isset($result[0])){
    $item = $this->createItem($result[0]);
    $item->categoria =$this->getCatName($result[0]->categoria);
    $item->unitamisura = $this->getUmName($result[0]->unitamisura);
    return $item;
  }
  else header("Location: /404");
    //passo array result (query db) a funzione createItem, che mi restituisce un articolo
    // ben formato che viene restituito dal return.
  }

public function catMainGroup (int $catID){
  $table = 'categoria';
  $where='categoria.categoriapadre = :categoria';
  $parameters[':categoria'] = $catID;
  $result = $this->database->selectWhere5(
    $table,
    ['*'],
    $where,
    $parameters
  );
  $maingroup = array();
  foreach($result as $categoria){
    $maingroup[]['catName'] = $categoria->descrizione;
    $maingroup[]['products'] = $this->getCategoryItem($categoria->idcategoria);
  }

  return $maingroup;


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
      $articolo->unitamisura = $this->getUmName($articolo->unitamisura);
      $categorygroup[] = $this->createItem($articolo);


    }
    return $categorygroup;
  }


  public function getUmName($umID){
    $table = 'unitamisura';
    $where='unitamisura.idum = :idum';
    $parameters[':idum'] = $umID;
    $result = $this->database->selectWhere($table,
    ['*'],
    $where,
    $parameters
  );
    return $result[0]->nomebreve;

  }

  public function getAllUm(){
    $table = 'unitamisura';
    $result = $this->database->selectAll($table);
    return $result;
  }

  public function getAllCat(){
    $table = 'categoria';
    $result = $this->database->selectAll($table);
    return $result;
  }

  public function getCatName($catID){
    $table = 'categoria';
    $where='categoria.idcategoria = :idcategoria';
    $parameters[':idcategoria'] = $catID;
    $result = $this->database->selectWhere($table,
    ['*'],
    $where,
    $parameters
  );
    return $result[0]->descrizione;

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
      $result->venditore,
      $result->quantita);
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


  private function randomItem(){
    //genero 5 numeri random, range 0- #maxID_articolo
    $table = 'articoli';
    $column = 'idprodotto';
    $max = $this->database->selectMax($table,$column);
    $min = 0;
    $value = rand( 0 ,$max[0]->massimo);
    return $value;


  }

  public function homeEvidenceItem($nrItem){

    while($nrItem >=0){
      $valore = $this->randomItem();
    }
    return $valore;
  }

  public function cartView(){

    $cart = $_SESSION['cart'];
    $cartgroup = array();
    foreach($cart as $item){

      $itemID = $item['itemID'];
      $cartgroup[]=array('item'=> $this->getItem($itemID),'qta'=>$item['qta']);

    }
    return $cartgroup;



  }




}


 ?>
