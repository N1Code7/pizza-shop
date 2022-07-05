<?php

declare(strict_types=1);

namespace App\Model\Table;

use PDO;
use App\Model\DTO\Pizza;
use App\Model\DTO\NewPizza;

class PizzaTable extends BaseTable
{
  const TABLE_NAME = "pizzas";

  public function insertOne(NewPizza $pizza): void
  {
    $tableName = self::TABLE_NAME;
    $request = <<<SQL
        INSERT INTO $tableName
        (
          name,
          description,
          price,
          url_picture
        ) 
        VALUE (?,?,?,?)
      SQL;

    $statement = $this->pdo->prepare($request);
    $statement->execute([
      $pizza->name,
      $pizza->description,
      $pizza->price,
      $pizza->url_picture
    ]);
  }

  public function findAll(): array
  {
    $tableName = self::TABLE_NAME;
    $request = <<<SQL
        SELECT *
        FROM $tableName
      SQL;

    $statement = $this->pdo->prepare($request);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS, Pizza::class);
  }
}
