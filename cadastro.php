<!DOCTYPE html>
<?php 
  session_start();
  if (!$_SESSION['cd_usuario']) {
    header('Location: login.html');
  }
?>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/cadastro.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
  <title>Cadastro de Cursos</title>
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
    <form action="create.php" method="POST" class="form-group">
      <h1>CADASTRO DE CURSOS</h1>
      <input type="text" name="nome" placeholder="Nome do Curso" required>
      <input type="number" name="horas" placeholder="Duração (em horas)" required>
      <input type="number" name="valor" placeholder="Valor" required>
      <button type="submit">Cadastrar Curso</button>
      <button class="sair" onclick="location.href='sair.php'">Sair</button>
    </form>
  </div>
</body>
</html>