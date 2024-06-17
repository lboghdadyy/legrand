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
    <input type="button" onclick="window.location.href='sign_up.php'" class="login-submit" value="Register"/>
  </form>
</body>

</html>