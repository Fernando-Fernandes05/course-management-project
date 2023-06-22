<?php
  include 'banco.php';

  function addCurso() {
    $databaseConnection = new DatabaseConnection();

    $databaseConnection->connect();

    $connection = $databaseConnection->getConnection();
    session_start();
    $cd_usuario = $_SESSION['cd_usuario'];

    $nome = $_POST['nome'];
    $horas = $_POST['horas'];
    $valor = $_POST['valor'];
    
    $query = $connection->prepare("INSERT INTO tb_curso (nm_curso, qt_horas, vl_curso, cd_usuario) VALUES (:nome, :horas, :valor, :cd_usuario)");
    $query->execute([
      'nome' => $nome,
      'horas' => $horas,
      'valor' => $valor,
      'cd_usuario' => $cd_usuario
  ]);
    return true;
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (addCurso()) {
      header('Location: index.php');
    }
    else {
      echo "Erro ao gravar os dados. Tente novamente mais tarde.";
    }
    exit();
  }

  echo $_SERVER['REQUEST_METHOD'];
?>