<?php

declare(strict_types=1);

namespace App\Controller;

use App\Validator\Validator;
use App\View\SignupView;

class SignupController
{
  public function start(): SignupView
  // : string indique le typage de la variable ou de la méthode/fonction
  {
    $view = new SignupView();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      if (!$view->newUser->last_name || strlen($view->newUser->last_name) < 2) {
        $view->errors->last_name = "Vous devez spécifier un Nom de 2 caractères minimum.";
        return $view;
      }

      if (!$view->newUser->first_name || strlen($view->newUser->first_name) < 2) {
        $view->errors->first_name = "Vous devez spécifier un Nom de 2 caractères minimum.";
        return $view;
      }

      if (!$view->newUser->email || !filter_var($view->newUser->email, FILTER_VALIDATE_EMAIL)) {
        $view->errors->email = "Votre email n'est pas valide.";
        return $view;
      }

      if (!$view->newUser->password || strlen($view->newUser->password) < 6) {
        $view->errors->pview->assword = "Votre mot de passe doit comporter au minimum 6 caractères.";
        return $view;
      }

      if (!$view->newUser->password_confirm || strlen($view->newUser->password_confirm) < 6) {
        $view->errors->password_confirm = "Votre mot de passe doit comporter au minimum 6 caractères.";
        return $view;
      }

      if ($view->newUser->password !== $view->newUser->password_confirm) {
        $view->errors->password_confirm = "Vos deux mots de passe ne correspondent pas.";
        return $view;
      }

      if (!$view->newUser->phone || strlen($view->newUser->phone) != 10) {
        $view->errors->phone = "Le numéro de téléphone doit contenir 10 chiffres.";
        return $view;
      }

      if (!$view->newUser->city) {
        $view->errors->city = "Vous devez spécifier une ville.";
        return $view;
      }

      if (!$view->newUser->cp || strlen($view->newUser->cp) != 5) {
        $view->errors->cp = "Votre code postal doit contenir 5 chiffres.";
        return $view;
      }

      if (!$view->newUser->address) {
        $view->errors->address = "Vous devez spécifier une numéro et un nom de voie.";
        return $view;
      }

      // $hasError = false;
      // foreach ($view->errors as $key => $value) {
      //   if ($value) {
      //     $hasError = true;
      //     break;
      //   }
      // }

      // if (!$hasError) {

      // Appel à la BDD

      header("Location: ./login.php");

      //   return $view;
      // }
    }

    return $view;
  }
}
