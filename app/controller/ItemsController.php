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
    $maingroup[]=array("catName"=> $categoria->descrizione,"catID"=>$categoria->idcategoria,"items"=>$this->getCategoryItem($categoria->idcategoria));
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

  public function insertItem(string $itemName,string $itemDesc,string $itemPrice,string $itemUM,string $itemPhoto,int $itemDiscount,
string $itemCat,string $itemStock): bool {



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
        'venditore' => 1

      ]);
    } else {
      return false;
    }
  }

  public function setUpdateItem($itemID,$itemName,$itemDesc,$itemPrice,$itemUM,$itemPhoto,$itemDiscount,$itemCat,$itemStock,$itemQuantity){
    
    if(isset($itemPhoto)){
    $changes = 'nome = :itemName,
                descrizione = :itemDesc,
                prezzopieno = :itemPrice,
                unitamisura = :itemUM,
                foto = :itemPhoto,
                percentualesconto = :itemDiscount,
                categoria = :itemCat,
                giacenza = :itemStock,
                quantita = :itemQuantity';
    $where = 'idprodotto = :idprodotto';


    $updateordine = $this->database->update('articoli', $changes, $where, [
      ':idprodotto' =>$itemID,
      ':itemName' => $itemName,
      ':itemDesc' => $itemDesc,
      ':itemPrice' => $itemPrice,
      ':itemUM' =>$itemUM,
      ':itemPhoto' => $itemPhoto,
      ':itemDiscount' => $itemDiscount,
      ':itemCat' => $itemCat,
      ':itemStock' => $itemStock,
      ':itemQuantity' => $itemQuantity,
    ]);
}
else {
    $changes = 'nome = :itemName,
            descrizione = :itemDesc,
            prezzopieno = :itemPrice,
            unitamisura = :itemUM,

            percentualesconto = :itemDiscount,
            categoria = :itemCat,
            giacenza = :itemStock,
            quantita = :itemQuantity';
$where = 'idprodotto = :idprodotto';


$updateordine = $this->database->update('articoli', $changes, $where, [
  ':idprodotto' =>$itemID,
  ':itemName' => $itemName,
  ':itemDesc' => $itemDesc,
  ':itemPrice' => $itemPrice,
  ':itemUM' =>$itemUM,
  ':itemDiscount' => $itemDiscount,
  ':itemCat' => $itemCat,
  ':itemStock' => $itemStock,
  ':itemQuantity' => $itemQuantity,
]);
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

    while($nrItem >0){
      $valore = $this->randomItem();
      $nrItem-1;
    }
    return $valore;
  }

  public function cartView(){
    if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    $cartgroup = array();
    foreach($cart as $item){

      $itemID =(int) $item['itemID'];
      $cartgroup[]=array('item'=> $this->getItem($itemID),'qta'=>$item['qta']);

    }
    return $cartgroup;
  }
  }

  public function createNewOrder(){

    $uID =$_SESSION['user']->idutente;
    $cart = $_SESSION['cart'];
      $this->database->insert('ordini', [
      'dataordine' => date("y-m-d"),
      'statoordine' => 'creato',
      'metodopagamento' => 'carta',
      'metodospedizione' => 'consegna',
      'idutente' => $uID
    ]);



  }

  public function getOrderNumber(){
    //restituisce l'ultimo ordine inserito dall'utente corrente,
    //funzione da usare solo in fase di creazione righe ordine
    $userID = $_SESSION['user']->idutente;
    $table = 'ordini';
    $column = 'idutente';
    $column1 = 'idordine';
    $maxorder = $this->database->selectMaxWhere($table,$column,$userID,$column1);
    $max = (int) $maxorder[0]->massimo;
    return $max;
  }

  public function creaRigheOrdine($nrorder){

    $cart = $_SESSION['cart'];
    //$nrorder = $this->getOrderNumber();

    $table = 'righeordine';
    foreach($cart as $item){

      //$itemID = $item['item']->itemID;
      $itemID = (int)$item['itemID'];
      $articolo = $this->getItem($itemID);
      $price=$articolo->prezzoPieno-(($articolo->prezzoPieno*$articolo->percentualeSconto)/100);

      $this->database->insert($table, [
        'idordine' => $nrorder,
        'idprodotto' => $itemID,
        'quantita' => $item['qta'],
        'unitamisura' => $articolo->unitaMisura,
        'prezzounitario' => $price,
        'totaleriga' => $item['qta']*$price

      ]);
    }}


      public function finalizeOrder($order,$userID){
        // da invocare dopo aver creato l'ordine e le righe ordine
        // aggiorna tabella ordine, caricando il totale
        // cancella la SESSION Carrello
        $table = 'righeordine';
        $column = 'idordine';
        $column1 = 'totaleriga';
        $param = $order;


        //ricavo totale ordine sommando tutte le righe dell'ordine
        $totale =$this->database->selectSUM($table,$column,$param,$column1);
        $changes = 'totaleordine = :totaleordine';
        $where = 'idordine = :idordine';
        $total = (int)($totale[0]->totale);

        $updateordine = $this->database->update('ordini', $changes, $where, [
          ':totaleordine' => $total,
          ':idordine' =>$order
        ]);

        //aggiornamento tabella ordine con totale

        unset($_SESSION['cart']);
        return $result=true;

      }

      public function getAllOrder(){
        $userID = $_SESSION['user']->idutente;
        $table = 'ordini';
        $where='ordini.idutente = :idutente';
        $parameters[':idutente'] = $userID;
        $result = $this->database->selectWhere(
          $table,
          ['*'],
          $where,
          $parameters
        );
        if(isset($result[0])){
        return $result;
      }}

      public function getOrderLine($orderID){
        $table = 'righeordine';
        $where='righeordine.idordine = :idordine';
        $parameters[':idordine'] = $orderID;
        $result = $this->database->selectWhere(
          $table,
          ['*'],
          $where,
          $parameters
        );
        if(isset($result[0])){
        return $result;
      }
      }





  }







 ?>
