<?php
  include 'banco.php';

  function addUser() {
    $databaseConnection = new DatabaseConnection();

    $databaseConnection->connect();

    $connection = $databaseConnection->getConnection();
    session_start();
    $cd_usuario = $_SESSION['cd_usuario'];

    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
    $query = $connection->prepare("INSERT INTO tb_usuario (email_id, senha_id) VALUES (:email, :senha)");
    $query->execute([
      'email' => $email,
      'senha' => $senha
  ]);
    return true;
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (addUser()) {
      header('Location: login.html');
    }
    else {
      echo "Erro ao gravar os dados. Tente novamente mais tarde.";
    }
    exit();
  }

  echo $_SERVER['REQUEST_METHOD'];
?>