<?php

class DataBase
{
    private $host = 'localhost';
    private $db_name = 'teste_ipm';
    private $usename = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->usename,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'connection error ' . $e->getMessage();
        }

        return $this->conn;
    }
}
