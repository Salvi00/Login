<?php
class User{
 
    // connessione con il database e specifica del nome della tabella utenti
    private $conn;
    private $table_name = "users";
 
    // specifico gli attributi coinvolti 
    public $id;
    public $username;
    public $password;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // funzione per il signup degli utenti
    function signup(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // coda per inserire nuovi utenti
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, created=:created";
    
        // preparazione coda
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->created=htmlspecialchars(strip_tags($this->created));
    
        // associazione dei valori
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created", $this->created);
    
        // esecuzione della coda
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }
    // login utenti
    function login(){
        // seleizione delle code per verificare le credenziali
        $query = "SELECT
                    `id`, `username`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."'";
        // preparo la query
        $stmt = $this->conn->prepare($query);
        // esecuzione della coda
        $stmt->execute();
        return $stmt;
    }
    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."'";
        // preparo la coda 
        $stmt = $this->conn->prepare($query);
        // eseguo la coda
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}