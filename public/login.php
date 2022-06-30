<?php

require_once "./../vendor/autoload.php";

use App\Controller\LoginController;

?>

<?php $title = "Connexion"; ?>
<?php $nav_home = ""; ?>
<?php $header_content = "" ?>

<?php

$controller = new LoginController();

$view = $controller->toLogin();

?>

<?php ob_start();  ?>

<div class="main-login">
  <h2>Connexion</h2>
  <form action="" method="POST">
    <div class="row row__email">
      <label for="email">Votre mail :</label>
      <input type="email" name="email" id="email">
    </div>
    <?php if ($view->errors->email) : ?>
      <p class="errorMsg"><?= $view->errors->email ?></p>
    <?php endif ?>
    <div class="row row__password">
      <label for="password">Votre mot de passe :</label>
      <input type="password" name="password" id="password">
    </div>
    <?php if ($view->errors->password) : ?>
      <p class="errorMsg"><?= $view->errors->password ?></p>
    <?php endif ?>
    <div class="btn">
      <button class="btn btn__validation" type="submit">
        <i class="fa-solid fa-right-to-bracket"></i>
        <span>Se connecter</span>
      </button>
    </div>
    <div class="create-account">
      <a href="./signup.php">Pas encore de compte ? Cliquez pour en créer un.</a>
    </div>

  </form>
</div>

<?php $main = ob_get_clean(); ?>

<?php require("./templates/layout.php"); ?>