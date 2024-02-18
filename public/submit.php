<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_POST['privacyPolicy'] = $_POST['privacyPolicy'] ?? '';
  formAction($_POST);
} else {
  echo 'Invalid request';
}

function formAction(array $formData)
{
  $validate = validate($formData);
  if ($validate === true) {
    sendEmail($formData);
  } else {
    echo json_encode(['errors' => validate($formData)]);
  }

  die();
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
    $validateField = validateField($name, $value);
    if ($validateField !== true) {
      $errors[$name] = $validateField;
    }
  }

  if (count($errors) > 0) {
    return $errors;
  }

  return true;
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

  return true;
}

function sendEmail(array $formData)
{
  $mail = new PHPMailer(true);
  $response = array(
    'success' => false,
    'message' => ''
  );

  try {
    $config = include '../config.php';

    $mail->isSMTP();
    $mail->Host = $config['smtp']['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['smtp']['username'];
    $mail->Password = $config['smtp']['password'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $config['smtp']['port'];

    // Form data
    $websiteUrl = sprintf(
      " %s://%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME']
    );
    $name = $formData['name'];
    $email = $formData['email'];
    $phone = $formData['phone'];
    $password = $formData['password'];
    $city = $formData['city'];

    $mail->setFrom('example@email.com', 'Connect With Us');
    $mail->addAddress($email, $name);
    $mail->addReplyTo('info@example.com', 'Information');

    $mail->isHTML(true);
    $mail->Subject = 'Submitting a form on the site ' . $websiteUrl;
    $mail->Body = "
      <p><b>Submitted form data</b></p>
      <p>Name: $name</p>
      <p>Email: $email</p>
      <p>Phone: $phone</p>
      <p>Password: $password</p>
      <p>City: $city</p>
    ";
    $mail->AltBody = "Submitted form data: Name: $name, Email: $email, Phone: $phone, Password: $password, City: $city";

    $mail->send();
    $response['success'] = true;
    $response['message'] = 'Message has been sent';
  } catch (Exception $e) {
    $response['message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  echo json_encode($response);
}