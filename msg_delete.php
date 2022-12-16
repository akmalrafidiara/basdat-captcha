<?php

include_once 'connection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "DELETE FROM `message` WHERE id='$id'";
  $conn->exec($sql);

  header('Location: index.php');
}