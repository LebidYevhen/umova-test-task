<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  formAction($_POST);
} else {
  echo "Invalid request";
}

function formAction(array $formData)
{
  $formData['privacyPolicy'] = $formData['privacyPolicy'] ?? '';

  echo json_encode(['errors' => validate($formData)]);
}

function sanitizeInput(mixed $input)
{
  $input = trim($input);
  $input = strip_tags($input);
  return preg_replace("/&#?[a-z0-9]+;/i", "", $input);
}

function validate($formData)
{
  $errors = [];

  foreach ($formData as $name => $value) {
    $value = sanitizeInput($value);
    if (validateField($name, $value)) {
      $errors[$name] = validateField($name, $value);
    }
  }

  if (count($errors) > 0) {
    return $errors;
  }

  return false;
}

function validateField($name, $value)
{
  if (empty($value)) {
    return "The field cannot be empty";
  }

  if ($name === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
    return "Email is invalid";
  }

  if ($name === 'confirmPassword' && !empty($_POST['password']) && $value !== $_POST['password']) {
    return "passwords do not match";
  }

  if ($name === 'password' && !empty($_POST['confirmPassword']) && $value !== $_POST['confirmPassword']) {
    return "passwords do not match";
  }

  if ($name === 'phone' && !preg_match('/^\d{3}-\d{3}-\d{4}$/', $value)) {
    return "Phone is invalid";
  }

  return false;
}