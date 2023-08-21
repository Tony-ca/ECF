<?php

class Database {
    private $host = "localhost";
    private $dbname = "ecf";
    private $username = "root";
    private $password = "";
    protected $dbConnect;

    public function __construct() {
        try {
            $this->dbConnect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
}