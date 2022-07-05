<?php

declare(strict_types=1);

namespace App\Validator;

class Validator
{
  private $isValid = true;
  private $errors = [];

  public function isValid(): bool
  {
    return $this->isValid;
  }

  public function getError($fieldName)
  {
    return isset($this->errors[$fieldName]) ? $this->errors[$fieldName] : '';
  }


  public function validate(array $rules, array $payload)
  {
    foreach ($rules as $rule) {
      if (!$this->validateRequired($rule, $payload)) {
        continue;
      }
      switch ($rule['type']) {
        case 'string':
          $this->validateString($rule, $payload);
          break;
        case 'email':
          $this->validateEmail($rule, $payload);
          break;
        case 'password':
          $this->validatePassword($rule, $payload);
          break;
      }
    }

    return $this->isValid();
  }

  public function validateRequired(array $rule, array $payload): bool
  {
    if (true === $rule['required'] && !isset($payload[$rule['fieldName']])) {
      $this->isValid = false;
      $this->errors[$rule['fieldName']] = 'This field is required';

      return false;
    }

    return true;
  }

  public function validateString($rule, $payload)
  {
    if ($rule['minLength'] && strlen($payload["fieldName"]) < $rule['minLength']) {
      $this->errors->$payload["fieldName"] = 'Trop court, ' . $rule["minLength"] . ' minimum.';
    }

    if ($rule['maxLength'] && strlen($payload["fieldName"]) > $rule['minLength']) {
      $this->errors->$payload["fieldName"] = 'Trop long, ' . $rule["minLength"] . ' maximum.';
    }
    // Checkup logic, set $this->isValid to false if not valid, add
    // See add $this->errors[$rule['fieldname']] = 'your message';
  }

  public function validateEmail($rule, $payload)
  {
    // Checkup logic, set $this->isValid to false if not valid, add
    // See add $this->errors[$rule['fieldname']] = 'your message';
  }
}

// Call validator by giving validator ruleset in the format

$rules = [
  [
    'fieldName' => 'firstName',
    'type' => 'string',
    'minLength' => 10,
    'maxLength' => 20,
    'required' => true,
  ],
  [
    'fieldName' => 'email',
    'type' => 'email',
    'required' => true,
  ]
];

$validator = new MyValidator();
$isValid = $validator->validate($rules, $_POST);

// if false do repeat form with error messages shown
// use $validator->getError('firstName'); to get error message for a field.
