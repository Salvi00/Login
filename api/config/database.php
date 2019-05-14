<?php
class Database{
 
    // specifica di dove si trova il database 
    private $host = "localhost";
    private $db_name = "login_php";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // Funzione per ottenere la connessione col database
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>