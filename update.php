<?php
  include 'banco.php';

  function updateCurso() {
    $databaseConnection = new DatabaseConnection();

    $databaseConnection->connect();

    $connection = $databaseConnection->getConnection();

    $nome = $_POST['nome'];
    $horas = $_POST['horas'];
    $valor = $_POST['valor'];
    
    $query = $connection->query(" 
      UPDATE tb_curso SET
      nm_curso = '{$_POST['nome']}',
      qt_horas = '{$_POST['horas']}',
      vl_curso = '{$_POST['valor']}'
      WHERE cd_curso = '{$_POST['codigo']}'
    ");
    return true;
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (updateCurso()) {
      header('Location: index.php');
    }
    else {
      echo "Erro ao gravar os dados. Tente novamente mais tarde.";
    }
    exit();
  }

  echo $_SERVER['REQUEST_METHOD'];
?>