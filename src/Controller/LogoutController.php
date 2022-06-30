<?php

declare(strict_types=1);

namespace App\Controller;

class LogoutController
{
  public function toLogout()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      if ($_POST["logout"]) {
        var_dump($_POST);
        // session_start();
        $_SESSION["id"] = "";
        $_SESSION["name"] = "";
        $_SESSION["email"] = "";
        session_destroy();
        header("Location: ./login.php");
      }
    }
  }
}
