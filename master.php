<?
include('connection.php');
include('assets/php/application/check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/icon" href="assets/logo/Red & White Minimalist Automotive Car Logo (2).png" />
  <title>Le Grand Maroc Car</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

  <link rel="stylesheet" href="assets/css/master.css">
  <style>
    body {
      font-family: 'Open Sans';
      font-weight: 100;
      display: flex;
      overflow: hidden;
      background:  url(../images/welcome-hero/wallpaper.png);
      background-position: center;
      background-size: cover;
      background-position-x: -300px;


    }

    .login-form {
      
      background-color: rgb(130, 7, 7);
      box-shadow: 0 0 1rem rgba(0, 0, 0, 0.3);
      min-height: 10rem;
      height: 300px;
      width: 450PX;
      margin: auto;
      padding: .5rem;
      border-radius: 20PX;
      box-shadow: 10px #000;

    }
  </style>
</head>

<body>



  <form class="login-form" method="post">
    <p class="login-text">
      <span class="fa-stack fa-lg">
        <i class='bx bx-user'></i>
      </span>
    </p>
    <input type="text" name="useremail" class="login-username" autofocus="true" required="true" placeholder="Username" />
    <input type="password" name="password" class="login-password" required="true" placeholder="Password" />
    <input type="submit" name="Login" value="Login" class="login-submit" />
    <input type="button" onclick="window.location.href='sign_up.php'" class="login-submit" value="Register" />
  </form>
</body>

</html>