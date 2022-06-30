<?php

declare(strict_types=1);

namespace App\Model\DTO;

use PDO;
use Exception;

class Pizza
{
  public function getPizzaInfos()
  {
    try {
      $db = new PDO("mysql:host=127.0.0.1;dbname=pizzashop;port=8889", "root", "root");
    } catch (Exception $e) {
      die("Error : " . $e->getMessage());
    }

    $req = $db->prepare("SELECT * FROM pizzas");
    $req->execute();
    return $req->fetchAll();
  }
}
