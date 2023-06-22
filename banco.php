<?php
  class DatabaseConnection {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $connection;

    public function __construct($host='localhost:3306', $dbname='bd_curso', $username='root', $password='') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->connection = null;
    }

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}