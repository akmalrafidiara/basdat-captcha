<?php

session_start();

if (isset($_SESSION['login'])) {
  header('Location: index.php');
}

require_once 'connection.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $recaptcha = $_POST['g-recaptcha-response'];

  $secret_key = '6Lckq2AjAAAAAEg8hJRWiRpYkK8aq6fFNOIQvjNY';

  $credential = array(
    'secret' => $secret_key,
    'response' => $recaptcha
  );

  $verify = curl_init();
  curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($verify, CURLOPT_POST, true);
  curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
  curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($verify);

  $status = json_decode($response, true);

  if ($status['success'] == false) {
    $_SESSION['message'] = array("text" => "Check captcha first!", "alert" => "danger");
    header('Location: login.php');
    die;
  }

  $sql = "SELECT * FROM user WHERE username='$username'";
  $query = $conn->prepare($sql);
  $query->execute(array($username, $password));
  $row = $query->rowCount();
  $fetch = $query->fetch();

  if ($fetch == false) {
    $_SESSION['message'] = array("text" => "Username tidak ditemukan!", "alert" => "danger");
    header('Location: login.php');
    die;
  }

  $checkPass = password_verify($password, $fetch['password']);
  // var_dump($password, $fetch['password'], $checkPass);
  // die;
  if ($checkPass == false) {
    $_SESSION['message'] = array("text" => "Password salah!", "alert" => "danger");
    header('Location: login.php');
    die;
  }

  if ($fetch == true && $checkPass == true) {
    $_SESSION['login'] = true;
    $_SESSION['id'] = $fetch['id'];
    $_SESSION['name'] = $fetch['f_name'] . ' ' . $fetch['l_name'];
    $_SESSION['username'] = $fetch['username'];
    $_SESSION['email'] = $fetch['email'];
    $_SESSION['birth_of_date'] = $fetch['birth_of_date'];
    $_SESSION['gender'] = $fetch['gender'];
    header('Location: index.php');
  } else {
    $_SESSION['message'] = array("text" => "Login failed", "alert" => "danger");
    header('Location: login.php');
    die;
  }
}