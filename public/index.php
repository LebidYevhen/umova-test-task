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
  <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400&family=Overpass:wght@600;700&display=swap"
        rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
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
    <label for="password" class="password">
      <input type="password" name="password" id="password" placeholder="Password *">
      <svg class="password-show" xmlns="http://www.w3.org/2000/svg" width="22" height="15" viewBox="0 0 22 15">
        <path d="M21.9065 7.11753C19.6621 3.15003 15.4814 0 11 0C6.51859 0 2.33789 3.15003 0.0935156 7.11753C-0.0311719 7.35003 -0.0311719 7.63503 0.0935156 7.86753C2.33789 11.8425 6.51859 15 11 15C15.4814 15 19.6621 11.8425 21.9065 7.86753C22.0312 7.63503 22.0312 7.35003 21.9065 7.11753ZM11 12.1875C8.46958 12.1875 6.4159 10.0875 6.4159 7.50003C6.4159 4.91253 8.46958 2.81253 11 2.81253C13.5304 2.81253 15.5841 4.91253 15.5841 7.50003C15.5841 10.0875 13.5304 12.1875 11 12.1875Z"
        />
        <path d="M11 10.6869C12.7216 10.6869 14.1172 9.25981 14.1172 7.4994C14.1172 5.73899 12.7216 4.3119 11 4.3119C9.27842 4.3119 7.88281 5.73899 7.88281 7.4994C7.88281 9.25981 9.27842 10.6869 11 10.6869Z"
        />
      </svg>
      <svg class="password-hide" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path d="M10.8214 14.3813L14.8692 10.2854L14.9278 10.5375C15.7207 13.3523 13.1333 15.1204 11.1275 14.4886L10.8214 14.3813Z"/>
        <path d="M12.0082 16.0731C14.6604 16.0731 16.5821 13.8944 16.5821 11.5281C16.5821 10.6145 16.2411 9.74351 16.0249 9.20826L18.8 6.57518C20.4163 7.70033 22.1861 9.64622 23 11.4509C21.077 15.2284 16.877 18.8225 11.6883 18.8225C10.343 18.8225 8.74602 18.388 7.4391 17.7903L9.69514 15.4893C10.415 15.8923 11.3884 16.0731 12.0082 16.0731ZM1.98183 18.7921L4.17274 16.6321L4.73227 16.0731C3.14674 14.851 1.8217 13.3994 1 11.5035C2.95828 7.42937 6.78647 4.31131 11.5912 3.96064C13.2328 3.96064 14.4313 4.14259 16.0249 4.78851L16.4333 4.4508L19.0143 2L20.2395 3.20314L3.20701 20L1.98183 18.7921ZM7.77053 13.1329L8.93487 11.9686C8.89162 11.7649 8.88721 11.5244 8.88721 11.3112C8.97453 9.72968 10.2384 8.37081 12.0817 8.37081C12.298 8.37081 12.5046 8.39923 12.7064 8.44186L13.9058 7.31413C13.2668 7.0015 12.4673 6.82981 11.5912 6.91728C9.12525 7.31413 7.62539 8.82095 7.41183 11.3906C7.41183 12.1641 7.5543 12.4852 7.77053 13.1329Z"
        />
      </svg>
    </label>
    <label for="confirmPassword" class="password">
      <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password *" required>
      <svg class="password-show" xmlns="http://www.w3.org/2000/svg" width="22" height="15" viewBox="0 0 22 15">
        <path d="M21.9065 7.11753C19.6621 3.15003 15.4814 0 11 0C6.51859 0 2.33789 3.15003 0.0935156 7.11753C-0.0311719 7.35003 -0.0311719 7.63503 0.0935156 7.86753C2.33789 11.8425 6.51859 15 11 15C15.4814 15 19.6621 11.8425 21.9065 7.86753C22.0312 7.63503 22.0312 7.35003 21.9065 7.11753ZM11 12.1875C8.46958 12.1875 6.4159 10.0875 6.4159 7.50003C6.4159 4.91253 8.46958 2.81253 11 2.81253C13.5304 2.81253 15.5841 4.91253 15.5841 7.50003C15.5841 10.0875 13.5304 12.1875 11 12.1875Z"
        />
        <path d="M11 10.6869C12.7216 10.6869 14.1172 9.25981 14.1172 7.4994C14.1172 5.73899 12.7216 4.3119 11 4.3119C9.27842 4.3119 7.88281 5.73899 7.88281 7.4994C7.88281 9.25981 9.27842 10.6869 11 10.6869Z"
        />
      </svg>
      <svg class="password-hide" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path d="M10.8214 14.3813L14.8692 10.2854L14.9278 10.5375C15.7207 13.3523 13.1333 15.1204 11.1275 14.4886L10.8214 14.3813Z"/>
        <path d="M12.0082 16.0731C14.6604 16.0731 16.5821 13.8944 16.5821 11.5281C16.5821 10.6145 16.2411 9.74351 16.0249 9.20826L18.8 6.57518C20.4163 7.70033 22.1861 9.64622 23 11.4509C21.077 15.2284 16.877 18.8225 11.6883 18.8225C10.343 18.8225 8.74602 18.388 7.4391 17.7903L9.69514 15.4893C10.415 15.8923 11.3884 16.0731 12.0082 16.0731ZM1.98183 18.7921L4.17274 16.6321L4.73227 16.0731C3.14674 14.851 1.8217 13.3994 1 11.5035C2.95828 7.42937 6.78647 4.31131 11.5912 3.96064C13.2328 3.96064 14.4313 4.14259 16.0249 4.78851L16.4333 4.4508L19.0143 2L20.2395 3.20314L3.20701 20L1.98183 18.7921ZM7.77053 13.1329L8.93487 11.9686C8.89162 11.7649 8.88721 11.5244 8.88721 11.3112C8.97453 9.72968 10.2384 8.37081 12.0817 8.37081C12.298 8.37081 12.5046 8.39923 12.7064 8.44186L13.9058 7.31413C13.2668 7.0015 12.4673 6.82981 11.5912 6.91728C9.12525 7.31413 7.62539 8.82095 7.41183 11.3906C7.41183 12.1641 7.5543 12.4852 7.77053 13.1329Z"
        />
      </svg>
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
          <input type="checkbox" name="privacyPolicy" id="privacyPolicy" required> I have read and accepted <a href="#">privacy
            policy</a>
        </label>
        <input type="submit" name="submit" value="Submit">
      </div>
    </div>
  </form>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>