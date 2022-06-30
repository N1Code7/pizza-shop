<?php session_start(); ?>

<?php require_once "./../vendor/autoload.php" ?>

<?php $title = "Accueil"; ?>
<?php $nav_home = "nav--home"; ?>

<?php ob_start(); ?>
<header class="header-home">
  <div class="bg-img"></div>
  <div class="filter"></div>
  <div class="content">
    <h1>PizzaShop</h1>
    <p>Vos meilleures pizzas à portée de click !</p>
  </div>
</header>

<?php $header_content = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php
if (!isset($_SESSION["id"])) {
  $_SESSION["id"] = "";
  $_SESSION["name"] = "";
  $_SESSION["email"] = "";
  session_destroy();
}
?>

<?php

use App\Controller\PizzaController;

$controller = new PizzaController();

$view = $controller->displayPizzaInfos();

var_dump($_POST);
?>

<div class="main-home">
  <p>Bonjour <?= $_SESSION["name"]; ?></p>
  <h2>Nos pizzas</h2>

  <div class="cards-container">
    <?php foreach ($view->pizzas as $pizza) { ?>
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
    <?php } ?>
  </div>

</div>


<?php $main = ob_get_clean(); ?>


<?php require("./templates/layout.php"); ?>