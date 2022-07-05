<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UserTable;
use App\View\LoginUserView;

class LoginController
{
  public function start(): LoginUserView
  {
    session_start();

    $view = new LoginUserView();

    $table = new UserTable();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      if (!$view->credentials->email || !filter_var($view->credentials->email, FILTER_VALIDATE_EMAIL)) {
        $view->errors->email = "Email invalide";

        return $view;
      }

      if (!$view->credentials->password || strlen($view->credentials->password) < 6) {
        $view->errors->password = "Mot de passe trop court";

        return $view;
      }

      $user = $table->findOneByEmail($view->credentials->email);

      if (false === $user) {
        $view->errors->email = "L'email entré n'existe pas.";
        return $view;
      }

      if (!password_verify($view->credentials->password, $user["password"])) {
        $view->errors->password = "Votre mot de passe ne correspond pas !";
        return $view;
      }

      $_SESSION["user"] = $user;

      die(var_dump("Connexion OK !"));
    }
    return $view;
  }
}
