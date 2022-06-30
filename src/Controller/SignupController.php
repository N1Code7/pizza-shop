<?php

declare(strict_types=1);

namespace App\Controller;

use PDO;
use Exception;
use App\Model\DTO\NewUser;
use App\Model\DTO\NewUserError;
use App\View\SignupView;

class SignupController
{
  public function hello(string $name): string
  {
    return "hello " . $name;
  }

  public function saveUser(): SignupView
  // : string indique le typage de la variable ou de la méthode/fonction
  {
    $newUser = new NewUser();

    $errors = new NewUserError();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      if (!$newUser->last_name || strlen($newUser->last_name) < 2) {
        $errors->last_name = "Vous devez spécifier un Nom de 2 caractères minimum.";
      }

      if (!$newUser->first_name || strlen($newUser->first_name) < 2) {
        $errors->first_name = "Vous devez spécifier un Nom de 2 caractères minimum.";
      }

      if (!$newUser->email || !filter_var($newUser->email, FILTER_VALIDATE_EMAIL)) {
        $errors->email = "Votre email n'est pas valide.";
      }

      if (!$newUser->password || strlen($newUser->password) < 6) {
        $errors->password = "Votre mot de passe doit comporter au minimum 6 caractères.";
      }

      if (!$newUser->password_confirm || strlen($newUser->password_confirm) < 6) {
        $errors->password_confirm = "Votre mot de passe doit comporter au minimum 6 caractères.";
      }

      if ($newUser->password !== $newUser->password_confirm) {
        $errors->password_confirm = "Vos deux mots de passe ne correspondent pas.";
      }

      if (!$newUser->phone || strlen($newUser->phone) != 10) {
        $errors->phone = "Le numéro de téléphone doit contenir 10 chiffres.";
      }

      if (!$newUser->city) {
        $errors->city = "Vous devez spécifier une ville.";
      }

      if (!$newUser->cp || strlen($newUser->cp) != 5) {
        $errors->cp = "Votre code postal doit contenir 5 chiffres.";
      }

      if (!$newUser->address) {
        $errors->address = "Vous devez spécifier une numéro et un nom de voie.";
      }

      $hasError = false;
      foreach ($errors as $key => $value) {
        if ($value) {
          $hasError = true;
          break;
        }
      }

      if (!$hasError) {

        try {
          // self::$db = new PDO("mysql:host=localhost;dbname=pizzashop", "root", "root");
          $db = new PDO("mysql:host=127.0.0.1;dbname=pizzashop;port=8889", "root", "root");
        } catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
        }

        $req = $db->prepare("INSERT INTO users (`last_name`, `first_name`, `email`, `password`, `phone`, `city`, `cp`, `address`, `supplement`, `type`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $req->execute([
          $newUser->last_name,
          $newUser->first_name,
          $newUser->email,
          password_hash($newUser->password, PASSWORD_DEFAULT),
          $newUser->phone,
          $newUser->city,
          $newUser->cp,
          $newUser->address,
          $newUser->supplement,
          "client"
        ]);

        header("Location: ./login.php");

        return new SignupView($newUser, $errors);
      }
    }

    return new SignupView($newUser, $errors);
  }
}
