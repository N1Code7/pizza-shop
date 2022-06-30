<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\DTO\LoginUser;
use App\Model\DTO\LoginUserError;
use App\View\LoginUserView;

class LoginController
{
  public function toLogin(): LoginUserView
  {
    $loginInfos = new LoginUser();
    $errors = new LoginUserError();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      if (!$loginInfos->email) {
        $errors->email = "Vous devez entrer un email.";
      } else if (!$loginInfos->password) {
        $errors->password = "Vous devez entrer un mot de passe.";
      } else if (!$loginInfos->getUsers($loginInfos->email)) {
        $errors->email = "Le mail saisi n'existe pas.";
      } else if (password_verify($loginInfos->password, $loginInfos->getUsers($loginInfos->email)["password"])) {
        session_start();
        $_SESSION['id'] = $loginInfos->getUsers($loginInfos->email)["id_user"];
        $_SESSION['name'] = $loginInfos->getUsers($loginInfos->email)["first_name"] . " " . $loginInfos->getUsers($loginInfos->email)["last_name"];
        $_SESSION['email'] = $loginInfos->getUsers($loginInfos->email)["email"];
        // die(var_dump($_SESSION));
        header("Location: ./index.php");
      }
    }

    return new LoginUserView($errors);
  }
}
