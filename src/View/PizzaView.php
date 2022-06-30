<?php

declare(strict_types=1);

namespace App\View;

use App\Controller\PizzaController;

class PizzaView
{
  public $pizzas;

  public function __construct($pizzas)
  {
    $this->pizzas = $pizzas;
  }
}
