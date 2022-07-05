<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\PizzaTable;
use App\View\PizzaListView;

class PizzaListController
{
  public function start(): PizzaListView
  {
    $table = new PizzaTable();

    return new PizzaListView($table->findAll());
  }
}
