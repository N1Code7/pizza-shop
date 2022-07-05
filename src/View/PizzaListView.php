<?php

declare(strict_types=1);

namespace App\View;

class PizzaListView
{
  public array $list;

  public function __construct(array $list)
  {
    $this->list = $list;
  }
}
