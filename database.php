<?php

class Database{
    private $host = 'localhost';
    private $dbname = 'projekti';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct(){
        try{
            $this->conn = new PDO(dsn: "mysql:host={$this->host};dbname={$this->dbname}", username: $this->username, password: $this->password);
            $this->conn->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
        }catch(PDOExeption $e){
            die(message: "Connection failed: " . $e->getMessage());
        }
    }
    public function getConnection(): PDO{
        return $this->conn;
    }
}

?>