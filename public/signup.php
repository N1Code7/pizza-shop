<?php require_once "./../vendor/autoload.php"; ?>

<?php $title = "Créer un compte"; ?>
<?php $nav_home = ""; ?>
<?php $header_content = "" ?>

<?php

use App\Controller\SignupController;

$controller = new SignupController();

$view = $controller->saveUser();

?>

<?php ob_start(); ?>

<div class="main-signup">
  <h2>Inscription</h2>
  <form method="post">

    <h4>Vos informations personnelles</h4>

    <div class="rows-container">

      <div class="row">
        <label for="lastName" class="required">Votre NOM :</label>
        <input type="text" id="lastName" name="last_name" value="<?= $view->newUser->last_name ?>">
      </div>
      <?php if ($view->errors->last_name) : ?>
        <p class="errorMsg"><?= $view->errors->last_name ?></p>
      <?php endif ?>

      <div class="row">
        <label for="firstName" class="required">Votre Prénom :</label>
        <input type="text" id="firstName" name="first_name" value="<?= $view->newUser->first_name ?>">
      </div>
      <?php if ($view->errors->first_name) : ?>
        <p class="errorMsg"><?= $view->errors->first_name ?></p>
      <?php endif ?>

      <div class="row">
        <label for="email" class="required">Votre email :</label>
        <input type="email" id="email" name="email" value="<?= $view->newUser->email ?>">
      </div>
      <?php if ($view->errors->email) : ?>
        <p class="errorMsg"><?= $view->errors->email ?></p>
      <?php endif ?>

      <div class="row">
        <label for="password" class="required">Votre Mot de passe :</label>
        <input type="password" id="password" name="password" value="<?= $view->newUser->password ?>">
      </div>
      <?php if ($view->errors->password) : ?>
        <p class="errorMsg"><?= $view->errors->password ?></p>
      <?php endif ?>

      <div class="row">
        <label for="passwordConfirm" class="required">Confirmer votre Mot de passe :</label>
        <input type="password" id="passwordConfirm" name="password_confirm" value="<?= $view->newUser->password_confirm ?>">
      </div>
      <?php if ($view->errors->password_confirm) : ?>
        <p class="errorMsg"><?= $view->errors->password_confirm ?></p>
      <?php endif ?>

      <div class="row">
        <label for="phone" class="required">Votre Téléphone :</label>
        <input type="text" pattern="0[1-9][0-9]{8}" id="phone" name="phone" placeholder="ex : 0123456789" value="<?= $view->newUser->phone ?>">
      </div>
      <?php if ($view->errors->phone) : ?>
        <p class="errorMsg"><?= $view->errors->phone ?></p>
      <?php endif ?>

    </div>

    <h4>Votre adresse</h4>

    <div class="rows-container">
      <div class="row">
        <label for="city" class="required">Ville :</label>
        <input type="text" id="city" name="city" value="<?= $view->newUser->city ?>">
      </div>
      <?php if ($view->errors->city) : ?>
        <p class="errorMsg"><?= $view->errors->city ?></p>
      <?php endif ?>
      <div class="row">
        <label for="cp" class="required">Code postal :</label>
        <input type="text" pattern="[0-9]{5}" id="cp" name="cp" value="<?= $view->newUser->cp ?>">
      </div>
      <?php if ($view->errors->cp) : ?>
        <p class="errorMsg" class="required"><?= $view->errors->cp ?></p>
      <?php endif ?>
      <div class="row">
        <label for="address" class="required">N° et voie :</label>
        <input type="text" id="address" name="address" value="<?= $view->newUser->address ?>">
      </div>
      <?php if ($view->errors->address) : ?>
        <p class="errorMsg"><?= $view->errors->address ?></p>
      <?php endif ?>
      <div class="row">
        <label for="supplement">Complément :</label>
        <input type="text" id="supplement" name="supplement" value="<?= $view->newUser->supplement ?>">
      </div>
      <?php if ($view->errors->supplement) : ?>
        <p class="errorMsg"><?= $view->errors->supplement ?></p>
      <?php endif ?>
    </div>
    <div class="btn">
      <button class="btn__validation" type="submit" name="signup">
        <i class="fa-solid fa-user-plus"></i>
        <span>S'inscrire</span>
      </button>
    </div>
  </form>
</div>

<?php $main = ob_get_clean(); ?>

<?php require("./templates/layout.php"); ?>