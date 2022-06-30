<?php

declare(strict_types=1);

namespace App\View;

use App\Model\DTO\LoginUserError;

class LoginUserView
{
  public LoginUserError $errors;

  public function __construct(LoginUserError $errors)
  {
    $this->errors = $errors;
  }
}
