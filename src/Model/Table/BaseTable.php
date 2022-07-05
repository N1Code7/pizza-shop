<?php

declare(strict_types=1);

namespace App\Model\Table;

use Exception;
use PDO;

abstract class BaseTable
{
  protected PDO $pdo;

  public function __construct()
  {
    try {

      $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=pizzashop;port=8889", "root", "root");
    } catch (Exception $e) {
      die("Error : " . $e->getMessage());
    }
  }
}
