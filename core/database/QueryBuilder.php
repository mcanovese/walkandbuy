<?php
namespace Core\Database;
class QueryBuilder

{
  protected $pdo;


  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }


  public function selectAll($table){

      $statement = $this->pdo->prepare("select * from {$table}");
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_CLASS);
  }


  public function selectWhere(string $table, array $columns, string $where, array $parameters) {
    $query = \sprintf('select %s from %s where %s', \implode(', ', $columns), $table, $where);


    $statement = $this->pdo->prepare($query);
    $statement->execute($parameters);

    if (!$statement) return null;

    return $statement->fetchAll(\PDO::FETCH_OBJ);
  }




}




 ?>
