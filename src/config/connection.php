<?php
namespace src\Config;

use PDO;
use PDOException;

class Connection
{
    // Database Parameters
    // private $host = 'localhost';
    private $host = 'localhost';
    // private $db_name = 'godwddul_scandiweb_test';
    // private $username = 'godwddul_scandibella';
    // private $password = '?hcPO5uo63IZ';
    private $conn;

    private $db_name = 'scandiweb_test';
    private $username = 'root';
    private $password = '';

    // Connect to the DB 
    public function connect()
    {
        $this->conn = null;

        // Connect using PDO 
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            echo 'Connection Error: ' . $err->getMessage();
        }
        return $this->conn;
    }
}
