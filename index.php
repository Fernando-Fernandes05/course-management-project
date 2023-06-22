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
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
  <div class="div-container">
    <div class="div-table">
      <table class="table table-light table-bordered">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Duração (em horas)</th>
            <th>Valor</th>
            <th colspan="2" class="ud-row"></th>
          </tr>
        </thead>
        <?php
    
    $databaseConnection = new DatabaseConnection();
    
    $databaseConnection->connect();
    
    $connection = $databaseConnection->getConnection();
    
    $query = $connection->query("SELECT * FROM tb_curso
            WHERE cd_usuario = '{$_SESSION['cd_usuario']}'");

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <tr class="dados-tr">
                  <th scope="row"><?php echo $row['cd_curso'];?></td>
                  <td><?php echo $row['nm_curso'];?></td>
                  <td><?php echo $row['qt_horas'];?></td>
                  <td><?php echo "R$" . str_replace(".", ",", $row['vl_curso']);?></td>
                  <td><a class="icon update" href="edit.php?id=<?php echo $row['cd_curso'];?>">Editar</a></td>
                  <td><a class="icon delete" href="delete.php?id=<?php echo $row['cd_curso'];?>">Excluir</a></td>
                </tr>
                <?php
            }
            ?>
      </table>
    </div>
    <div class="buttons">
    <button class="btn-sair" onclick="location.href='sair.php'">Sair</button>
    <button class="btn-cadastro" onclick="location.href = 'cadastro.php'">Adicionar um curso</button>
    </div>
  </div>
</body>
</html>