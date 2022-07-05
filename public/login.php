<?php

require_once "./../vendor/autoload.php";

use App\Controller\LoginController;

$title = "Connexion";

$view = (new LoginController())->start();

include "./partials/page_start.php";

?>

<div class="main-login">
  <h2>Connexion</h2>
  <form method="POST">
    <div class="row row__email">
      <label for="email">Votre mail :</label>
      <input type="email" name="email" id="email" value="<? $view->credentials->email ?>">
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

<?php include "./partials/page_end.php"; ?>