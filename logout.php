<?php

session_start();

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

session_destroy();
header('Location: login.php');