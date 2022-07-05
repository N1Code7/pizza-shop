<?php

declare(strict_types=1);

namespace App\Model\DTO;

use PDO;
use Exception;

class LoginUser
{
  public ?string $email = "";
  public ?string $password = "";

  public function __construct()
  {
    $this->email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $this->password = isset($_POST["password"]) ? $_POST["password"] : "";
  }

  public function dbConnection()
  {
    try {
      $db = new PDO("mysql:host=127.0.0.1;dbname=pizzashop;port=8889", "root", "root");
    } catch (Exception $e) {
      die("Error : " . $e->getMessage());
    }
  }

  public function getUsers($email)
  {
    // $this->dbConnection();
    try {
      $db = new PDO("mysql:host=127.0.0.1;dbname=pizzashop;port=8889", "root", "root");
    } catch (Exception $e) {
      die("Error : " . $e->getMessage());
    }

    $req = $db->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$email]);
    return $req->fetch();
  }
}
