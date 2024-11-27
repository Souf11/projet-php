<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'tech_temple';  // Database name
    private $username = 'root';       // MySQL username
    private $password = '';           // MySQL password
    private $conn;

    // Constructor to initialize the connection
    public function __construct() {
        try {
            // Using PDO to connect to the database
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Method to get the connection object
    public function getConnection() {
        return $this->conn;
    }

    // Method to execute a query
    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
?>
