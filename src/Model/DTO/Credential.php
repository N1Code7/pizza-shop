<?php

declare(strict_types=1);

namespace App\Model\DTO;

class Credential
{
  public ?string $email = "";
  public ?string $password = "";

  public function __construct()
  {
    $this->email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $this->password = isset($_POST["password"]) ? $_POST["password"] : "";
  }
}
