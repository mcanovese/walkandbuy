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

      return $statement->fetchAll(\PDO::FETCH_CLASS);
  }

  public function selectMax($table,$column){

      $statement = $this->pdo->prepare("select max({$column}) as massimo from {$table}");
      $statement->execute();

      return $statement->fetchAll(\PDO::FETCH_CLASS);
  }

  public function selectMaxWhere($table,$column,$param,$column1){

      $statement = $this->pdo->prepare("select max({$column1}) as massimo from {$table} where {$column}={$param}");
      $statement->execute();

      return $statement->fetchAll(\PDO::FETCH_CLASS);
  }

  public function selectSUM($table,$column,$param,$column1){

      $statement = $this->pdo->prepare("select cast(sum({$column1}) as decimal(12,2)) as totale from {$table} where {$column}={$param}");
      $statement->execute();

      return $statement->fetchAll(\PDO::FETCH_CLASS);
  }

  public function update(string $table, string $changes, string $where, array $parameters): bool {
    $query = \sprintf('update %s set %s where (%s)', $table, $changes, $where);

    $statement = $this->pdo->prepare($query);
    return $statement->execute($parameters);
  }





  public function selectWhere(string $table, array $columns, string $where, array $parameters) {
    $query = \sprintf('select %s from %s where %s', \implode(', ', $columns), $table, $where);


    $statement = $this->pdo->prepare($query);
    $statement->execute($parameters);

    if (!$statement) return null;

    return $statement->fetchAll(\PDO::FETCH_OBJ);
  }

  public function selectWhere5(string $table, array $columns, string $where, array $parameters) {
    $query = \sprintf('select  %s from %s where %s', \implode(', ', $columns), $table, $where);


    $statement = $this->pdo->prepare($query);
    $statement->execute($parameters);

    if (!$statement) return null;

    return $statement->fetchAll(\PDO::FETCH_OBJ);
  }

  public function insert(string $table, array $parameters): bool {
    $columns = \implode(', ', array_keys($parameters));
    $placeholders = \implode(
      ', ',
      \array_map(function ($key) { return ":{$key}"; }, \array_keys($parameters))
    );
    $query = \sprintf('insert into %s (%s) values (%s)', $table, $columns, $placeholders);


    $statement = $this->pdo->prepare($query);
    return $statement->execute($parameters);
  }




}




 ?>
