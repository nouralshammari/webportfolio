<?php

class Database {
    private static $instance = null;  // Singleton instance
    private $conn;

    private $servername = "localhost";
    private $dbname = "portfolio";
    private $username = 'root';
    private $password = 'Adil2007';

    // Private constructor to prevent multiple instantiations
    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
            die();
        }
    }

    // Static method to get the single instance of the class
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Method to get the connection
    public function getConnection() {
        return $this->conn;
    }
}
