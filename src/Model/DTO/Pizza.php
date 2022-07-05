<?php

declare(strict_types=1);

namespace App\Model\DTO;

class Pizza
{
  public int $id;
  public string $name;
  public ?string $description;
  public float $price;
  public string $url_picture;
}
