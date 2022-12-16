<?php
session_start();

require_once 'connection.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

$sql = "SELECT message.id, user_id, message, username  FROM `message` INNER JOIN `user` ON message.user_id=user.id ORDER BY message.id DESC";
$query = $conn->prepare($sql);
if ($query->execute()) {
  while ($row = $query->fetch()) {
    $cuitan[] = [
      'id' => $row['id'],
      'user_id' => $row['user_id'],
      'message' => $row['message'],
      'username' => $row['username']
    ];
  }
  $query->closeCursor();
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
    <div class="index">
      <div class="index-header">
        <div>
          <h1>Hi, <?= $_SESSION['name'] ?></h1>
          <p><?= $_SESSION['email'] ?></p>
        </div>
        <div>
          <a href="logout.php">Logout</a>
        </div>
      </div>
      <div class="index-body">
        <form action="addCuit.php" method="POST" class="cuit">
          <textarea name="cuit" placeholder="apa yang anda pikirkan..." class="textcuit" required></textarea>
          <button name="submit">Post</button>
        </form>
        <div class="cuit-list">
          <?php foreach ($cuitan as $cuit) : ?>
          <div class="cuit-item">
            <h4><?= $cuit['message'] ?></h4>
            <div class="action">
              <?php if ($cuit['user_id'] == $_SESSION['id']) : ?>
              <a href="msg_delete.php?id=<?= $cuit['id'] ?>" class="msg-delete"
                onclick="return confirm('Delete this item?')">delete</a>
              <?php else : ?>
              <p></p>
              <?php endif ?>
              <p>- <i><?= $cuit['username'] ?></i></p>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>