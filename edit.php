<!DOCTYPE html>
<?php
  include 'banco.php';
  session_start();
  if (!$_SESSION['cd_usuario']) {
    header('Location: login.html');
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/edit.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
  <title>Document</title>
</head>
<body>
<header>
    <nav>
      <div class="container-header">
        <ul>
          <li>
            <a href="cadastro.php">Cadastro</a>
          </li>
          <li>
            <a href="index.php">Tabela de cursos</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="container">
    <?php
      $databaseConnection = new DatabaseConnection();
      
      $databaseConnection->connect();
      
      $connection = $databaseConnection->getConnection();
      
      $query = $connection->query("SELECT * FROM tb_curso WHERE cd_curso = '{$_GET['id']}'");
      
      $row = $query->fetch(PDO::FETCH_ASSOC);
      ?>
          <form action="update.php" method="post" class="form-group">
            <h1>Editar</h1>
            <input type="hidden" name="codigo" value="<?php echo $row['cd_curso']; ?>">
            <input type="text" name="nome" value="<?php echo $row['nm_curso']; ?>" placeholder="Nome do curso" required>
            <input type="number" name="horas" value="<?php echo $row['qt_horas']; ?>" placeholder="Duração (em horas)" required>
            <input type="number" name="valor" value="<?php echo $row['vl_curso']; ?>" placeholder="Valor" required>
            <div class="buttons">
            <button class="btn-sair" onclick="location.href='sair.php'">Sair</button>
            <button type="submit">Atualizar</button>
            </div>
          </form>
          <?php
    ?>
  </div>
</body>
</html>