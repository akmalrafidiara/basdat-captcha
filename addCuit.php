<?php

session_start();
require_once 'connection.php';

if (!isset($_SESSION['login'])) {
  header('Location: index.php');
}

if (isset($_POST['submit'])) {

  $message = stringescape($_POST['cuit']);
  $user_id = $_SESSION['id'];
  $date = date('Y-m-d H:i:s');
  $sql = "INSERT INTO `message` VALUES ('', '$user_id', '$message', '$date')";
  $query = $conn->prepare($sql);
  $query->execute(array($user_id, $message, $date));

  header('Location: index.php');
}

function stringescape($data)
{
  $data = trim($data);
  $data = str_replace("'", "", $data);
  return $data;
}