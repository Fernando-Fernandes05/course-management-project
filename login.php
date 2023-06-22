<?php
  include 'banco.php';
  
  $databaseConnection = new DatabaseConnection();

  $databaseConnection->connect();

  $connection = $databaseConnection->getConnection();

  $query = $connection->query("SELECT * FROM tb_usuario 
  WHERE email_id = '{$_POST['email']}'");
  $result = $query->fetch(PDO::FETCH_ASSOC);

  if ($query->rowCount() > 0 && password_verify($_POST['senha'],$result['senha_id'])) {
    session_start();
    $_SESSION['cd_usuario'] = $result['cd_usuario'];
    header('Location: cadastro.php');
  } else {
    header('Location: login.html');
  }
  // user123@gmail.com $2y$10$iXZNfN/m..MJULmRt2okMeIADOlu8QYcouhWVdUChiRLo/r7hqlne
?>