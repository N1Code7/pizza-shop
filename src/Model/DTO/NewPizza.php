<?php

declare(strict_types=1);

namespace App\Model\DTO;

class NewPizza
{
  public ?string $name = "";
  public ?string $description = "";
  public ?float $price = 0.00;
  public ?string $url_picture = "";

  public function __construct()
  {
    $this->name = isset($_POST["name"]) ? $_POST["name"] : "";
    $this->description = isset($_POST["description"]) ? $_POST["description"] : "";
    $this->price = isset($_POST["price"]) ? $_POST["price"] : 0.00;
    $this->url_picture = isset($_POST["url_picture"]) ? $_POST["url_picture"] : "";
  }
}
