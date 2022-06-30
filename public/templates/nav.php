<?php

use App\Controller\LogoutController;

ob_start(); ?>

<?php if (!isset($_SESSION["id"])) {
  session_start();
  $_SESSION["id"] = "";
  $_SESSION["name"] = "";
  $_SESSION["email"] = "";
  session_destroy();
}

$controller = new LogoutController();
$controller->toLogout();

?>

<div class="nav-container">
  <div class="home-button-container">
    <a href="./index.php"><i class="fa-solid fa-house"></i></a>
  </div>
  <div class="menu-container">
    <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
    <a href="./login.php"><i class="fa-solid fa-user"></i></a>
    <?php if (isset($_SESSION["id"])) {
      echo '<button type="submit" name="logout"><i class="fa-solid fa-power-off"></i></button>';
    } ?>
  </div>
</div>

<?php $nav_content = ob_get_clean(); ?>