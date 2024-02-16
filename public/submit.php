<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Process form data (You can perform database operations, validation, etc. here)

  // Example response
  echo "Form submitted successfully. Name: $name, Email: $email";
} else {
  echo "Invalid request";
}