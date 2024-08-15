<?php

class DbConfig
{
    private $db_server = "mysql:dbname=crud_1; host=localhost";
    private $user_name = "root";
    private $password  = "";
    protected $connection;
    protected $dummy;

    public function __construct()
    {
        try {
            $this->connection = new PDO($this->db_server, $this->user_name, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $e) {
            echo "Error Message: " . $e->getMessage();
        }
    }
}

// $db = new DbConfig();
