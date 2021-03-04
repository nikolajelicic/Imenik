<?php

class DB{

    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "domaci_imenik";
    protected $conn;

    protected function connect(){

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->serverName . ";dbname=" . $this->dbName . $this->password,$this->userName); 
        } catch (PDOException $e) {
            echo "Connect error " . $e->getMessage();
        }
        return $this->conn;
    }
}

?>