<?php


class User{
    private $conn;
    private $table_name = "useri";
    public function __construct($db){
        $this->conn = $db;
}

public function register ($username, $email, $phone, $password): bool{
    $query = "INSERT INTO {$this->table_name} (username, email, phone, password) VALUES (:username, :email, :phone, :password)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', password_hash(password: $password, algo: PASSWORD_DEFAULT));

    if($stmt->execute()){
        return true;
    }
    return false;
    }
}
public function login ($username, $password): bool{
    $query = "SELECT username, email, phone, password FROM {$this->table_name} WHERE username = :username";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify(password: $password, hash: $row['password'])){
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            return true;
        }
    }
    return false;
}
?>