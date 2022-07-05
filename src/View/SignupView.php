<?php

declare(strict_types=1);

namespace App\View;

use App\Model\DTO\NewUser;
use App\Model\DTO\NewUserError;

class SignupView
{
  public NewUser $newUser;

  public NewUserError $errors;

  public function __construct()
  {
    $this->newUser = new NewUser();
    $this->errors = new NewUserError();
  }
}
