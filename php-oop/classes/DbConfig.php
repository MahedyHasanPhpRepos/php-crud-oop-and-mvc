<?php



class DbConfig
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    protected $connection;

    public function getConnect()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=crud_1", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // $sqlCommand = "create table Users (
            //     id int (10) not null auto_increment primary key ,
            //     name varchar(100) not null,
            //     age int(3) NOT NULL,
            //     email varchar(100) NOT NULL,
            //     add_date date 
            // )";
            // return $conn->exec($command);


            // $sqlCommand = "insert into Users
            // (id , name , age , email , add_date)
            // values 
            // (1 , 'mhdy' , 22 , 'mhdy@gmail.com', '2024-01-03'),
            // (2 , 'ajax' , 22 , 'ajax@gmail.com', '2024-02-03')
            // ";
            // $conn->exec($sqlCommand);

            // $sqlCommand = "select * from Users" ; 

            // return $conn ; 
            return "hey" ; 

            // $stmt = $conn->prepare($command);
            // $stmt->execute();
            // $users = $stmt->fetchAll();

            // return $users ; 

            // $connection = $conn ; 
            // return $this->$conn;
            // return "conn" ; 

        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }
}
