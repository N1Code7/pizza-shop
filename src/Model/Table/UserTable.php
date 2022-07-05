<?php

declare(strict_types=1);

namespace App\Model\Table;

use PDO;
use App\Model\DTO\NewUser;

class UserTable extends BaseTable
{
  const TABLE_NAME = "users";

  public function insertOne(NewUser $newUser): void
  {
    $tableName = self::TABLE_NAME;
    $request = <<<SQL
      INSERT INTO $tableName
      (
        `last_name`,
        `first_name`,
        `email`,
        `password`,
        `phone`,
        `city`,
        `cp`,
        `address`,
        `supplement`,
        `type`
      )
      VALUES (?,?,?,?,?,?,?,?,?,?)
    SQL;

    $statement = $this->pdo->prepare($request);
    $statement->execute([
      $newUser->last_name,
      $newUser->first_name,
      $newUser->email,
      password_hash($newUser->password, PASSWORD_DEFAULT),
      $newUser->phone,
      $newUser->city,
      $newUser->cp,
      $newUser->address,
      $newUser->supplement,
      "client"
    ]);
  }

  public function findOneByEmail(string $email): ?array
  {
    $tableName = self::TABLE_NAME;
    $request = <<<SQL
        SELECT *
        FROM $tableName
        WHERE email = ?
        LIMIT 1
      SQL;

    $statement = $this->pdo->prepare($request);
    $statement->execute([$email]);

    return $statement->fetch(PDO::FETCH_ASSOC);
  }
}
