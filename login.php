<?php

session_start();

if (isset($_SESSION['login'])) {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
  <div class="background">
    <img src="asset/img/background.jpg" alt="">
  </div>
  <div class="container">
    <div class="login-text child">
      <h1>Welcome To Basis Data</h1>
      <h4>Program sederhana untuk melakukan login dengan captcha sebagai tambahan keamanan.</h4>
    </div>
    <div class="login-form child">
      <h3>Login</h3>
      <?php if (isset($_SESSION['message'])) : ?>
      <div class="alert alert-<?= $_SESSION['message']['alert'] ?> msg">
        <?= $_SESSION['message']['text'] ?></div>
      <script>
      (function() {
        // removing the message 3 seconds after the page load
        setTimeout(function() {
          document.querySelector('.msg').remove();
        }, 10000)
      })();
      </script>
      <?php
      endif;
      // clearing the message
      unset($_SESSION['message']);
      ?>
      <form action="login_action.php" method="POST">
        <div class="form-control">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="" required>
        </div>
        <div class="form-control">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="" required>
        </div>
        <div class="g-recaptcha" data-sitekey="6Lckq2AjAAAAAJ6_YFfsuvCOa2YRex3bBTpmRCFl"></div>
        <button name="submit" type="submit">Login</button>
        <div>
          <p>Belum memiliki akun? <a href="registration.php">Daftar</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>