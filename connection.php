<?php
$db_username = 'root';
$db_password = '';
$conn = new PDO('mysql:host=localhost;dbname=2022_basdat_login', $db_username, $db_password);
if (!$conn) {
  die("Fatal Error: Connection Failed!");
}