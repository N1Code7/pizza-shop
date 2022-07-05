<?php

require_once "./../../vendor/autoload.php";

use App\Controller\PizzaListController;

$view = (new PizzaListController())->start();

?>

<?php

$title = "Liste des Pizzas";

include "./../partials/page_start.php";

?>

<div class="main-pizza-list">

  <div class="cards-container">
    <?php foreach ($view->list as $pizza) : ?>
      <div class="card">
        <div class="bg-img" style="background-image: url(<?= $pizza["url_picture"] ?>);"></div>
        <div class="blur"></div>
        <div class="card-content">
          <h3><?= $pizza["name"] ?></h3>
          <p class="description"><?= $pizza["description"] ?>
          </p>
          <span class="price"><?= $pizza["price"] ?> €</span>
          <div class="btn">
            <button class="btn__validation btn__validation--cart">
              <i class="fa-solid fa-cart-shopping"></i>
              <span>AJouter au panier</span>
            </button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>

<?php include "./../partials/page_end.php"; ?>