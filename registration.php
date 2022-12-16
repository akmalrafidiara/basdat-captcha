<?php
session_start();
require_once 'connection.php';

if (isset($_SESSION['login'])) {
  header('Location: index.php');
}

if (isset($_POST['submit'])) {
  if (
    $_POST['f_name'] != ""
    || $_POST['l_name'] != ""
    || $_POST['username'] != ""
    || $_POST['email'] != ""
    || $_POST['password'] != ""
    || $_POST['confirm_password'] != ""
    || $_POST['birth_of_date'] != ""
    || $_POST['gender'] != ""
  ) {
    try {
      $f_name = $_POST['f_name'];
      $l_name = $_POST['l_name'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $bod = $_POST['birth_of_date'];
      $gender = $_POST['gender'];
      $date = date('Y-m-d H:i:s');
      // md5 encrypted
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO `user` VALUES ('', '$username', '$email', '$password', '$f_name', '$l_name', '$bod', '$gender', '$date')";
      $conn->exec($sql);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    $_SESSION['message'] = array("text" => "User successfully created.", "alert" => "success");
    $conn = null;
    header('location:index.php');
  } else if ($_POST['password'] != $_POST['confirm_password']) {
    echo "
      <script>alert('Pasword tidak sesuai!')</script>
      <script>window.location = 'registration.php'</script>
    ";
  } else {
    echo "
      <script>alert('Lengkapi form pendaftaran!')</script>
      <script>window.location = 'registration.php'</script>
    ";
  }
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
    <div class="signup-text child">
      <h1>It is during our darkest moments that we must focus to see the light. </h1>
      <h4>-Aristotle</h4>
    </div>
    <div class="login-form child">
      <h3>Registration</h3>
      </script>
      <form action="" method="POST">
        <div class="form-duo">
          <div class="form-control">
            <label for="">First Name</label>
            <input type="text" name="f_name" placeholder="" required>
          </div>
          <div class="form-control">
            <label for="">Last Name</label>
            <input type="text" name="l_name" placeholder="" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="" required>
        </div>
        <div class="form-control">
          <label for="">Email</label>
          <input type="email" name="email" placeholder="" required>
        </div>
        <div class="form-duo">
          <div class="form-control">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="" required>
          </div>
          <div class="form-control">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="" required>
          </div>
        </div>
        <div class="form-duo">
          <div class="form-control">
            <label for="">Tanggal Lahir</label>
            <input type="date" name="birth_of_date" required>
          </div>
          <div class="form-control">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
              <option value="" selected disabled>Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <button name="submit" type="submit">Daftar</button>
        <div>
          <p>Sudah memiliki akun? <a href="login.php">Login</a></p>
        </div>
      </form>
    </div>
  </div>
</body>

</html>