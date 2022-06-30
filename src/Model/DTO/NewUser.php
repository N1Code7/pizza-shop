<?php

declare(strict_types=1);

namespace App\Model\DTO;

class NewUser
{
  public ?string $last_name = "";
  public ?string $first_name = "";
  public ?string $email = "";
  public ?string $password = "";
  public ?string $password_confirm = "";
  public ?string $phone = "";
  public ?string $city = "";
  public ?string $cp = "";
  public ?string $address = "";
  public ?string $supplement = "";


  public function __construct()
  {
    $this->last_name = isset($_POST["last_name"]) ? htmlspecialchars($_POST["last_name"]) : "";
    $this->first_name = isset($_POST["first_name"]) ? htmlspecialchars($_POST["first_name"]) : "";
    $this->email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $this->password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : "";
    $this->password_confirm = isset($_POST["password_confirm"]) ? htmlspecialchars($_POST["password_confirm"]) : "";
    $this->phone = isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : "";
    $this->city = isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : "";
    $this->cp = isset($_POST["cp"]) ? htmlspecialchars($_POST["cp"]) : "";
    $this->address = isset($_POST["address"]) ? htmlspecialchars($_POST["address"]) : "";
    $this->supplement = isset($_POST["supplement"]) ? htmlspecialchars($_POST["supplement"]) : "";
  }
}
