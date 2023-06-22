<?php
    include 'banco.php';

    function deletar() {
        $databaseConnection = new DatabaseConnection();

        $databaseConnection->connect();

        $connection = $databaseConnection->getConnection();

        $query = $connection->query( "
            DELETE FROM tb_curso
            WHERE cd_curso = '{$_GET['id']}'
        ");
        return true;
    }

    
    if (deletar()) {
        header('Location: index.php');
    }
    else {
        echo "Erro na gravação, tente novamente mais tarde.";
    }

?>