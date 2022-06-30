<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\DTO\Pizza;
use App\View\PizzaView;

class PizzaController
{
  public function displayPizzaInfos()
  {
    $pizza = new Pizza();
    $pizzas = $pizza->getPizzaInfos();

    return new PizzaView($pizzas);
  }
}
