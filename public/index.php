<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Connect With Us</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400&family=Overpass:wght@600;700&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://xn----7sbbaqhlkm9ah9aiq.net/upload/jquery.inputmask.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <div class="form__container">
    <h1 class="title">Reach Out and <span>Connect</span> With Us</h1>
    <p class="description">Bridging Your Ideas with Our Expertise</p>
    <form class="form" id="form" action="submit.php">
      <label for="name">
        <input type="text" name="name" id="name" placeholder="Name *" required>
      </label>
      <label for="email">
        <input type="email" name="email" id="email" placeholder="E-mail *" required>
      </label>
      <label for="phone">
        <input type="tel" name="phone" id="phone" placeholder="Phone *" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
      </label>
      <label for="password">
        <input type="password" name="password" id="password" placeholder="Password *">
      </label>
      <label for="confirmPassword">
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password *" required>
      </label>
      <label for="city">
        <select name="city" id="city" class="city" required>
          <option value="">Choose your city *</option>
          <option value="New Jersey">New Jersey 1</option>
          <option value="New Jersey">New Jersey 2</option>
          <option value="New Jersey">New Jersey 3</option>
        </select>
      </label>
      <div class="form__bottom-wrapper">
        <div class="form__privacy-policy-wrapper">
          <label for="privacyPolicy">
            <input type="checkbox" name="privacyPolicy" id="privacyPolicy"> I have read and accepted <a href="#">privacy policy</a>
          </label>
          <input type="submit" name="submit" value="Submit">
        </div>
      </div>
    </form>
  </div>
  <script src="assets/js/main.js"></script>
</body>
</html>