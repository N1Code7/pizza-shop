<?php

declare(strict_types=1);

namespace App\View;

use App\Model\DTO\Credential;
use App\Model\DTO\CredentialError;

class LoginUserView
{
  public Credential $credentials;

  public CredentialError $errors;

  public function __construct()
  {
    $this->credentials = new Credential();
    $this->errors = new CredentialError();
  }
}
