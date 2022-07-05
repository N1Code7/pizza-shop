<?php

declare(strict_types=1);

namespace App\View;

use App\Model\DTO\NewPizza;
use App\Model\DTO\NewPizzaError;

class NewPizzaView
{
  public NewPizza $pizzas;
  public NewPizzaError $errors;

  public function __construct()
  {
    $this->pizzas = new NewPizza();
    $this->errors = new NewPizzaError();
  }
}
