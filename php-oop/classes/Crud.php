
<?php

include('../interfaces/CrudInterface.php');
include('./DbConfig.php');

class Crud extends DbConfig implements CrudInterface
{

    public $name;
    public $age;
    public $email;


    public function display()
    {
        echo "display";
    }


    public function read()
    {
        $stmt = $this->connection->prepare("select * from Users order by id desc");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }


    public function create()
    {

        $add_date = $this->getLocalTimeWithZone();
        $ip_address = $this->getClientIpAddress();

        
        // return $ip_address ; 

        try {


            $sql_query = "insert into Users (name , age , email , add_date , ip_address) 
                values (:name , :age , :email , :add_date , :ip_address)";

            $stmt = $this->connection->prepare($sql_query);

            $name = $this->name;
            $age = $this->age;
            $email = $this->email;
            $add_date = $add_date;
            $ip_address = $ip_address ; 

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':add_date', $add_date);
            $stmt->bindParam(':ip_address', $ip_address);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error Message: " . $e->getMessage();
        }
    }


    public function show($id) {}
    public function update() {}
    public function delete() {}

    function getLocalTimeWithZone()
    {
        $client_timezone = isset($_SERVER['HTTP_TIME_ZONE']) ? $_SERVER['HTTP_TIME_ZONE'] : 'UTC';
        $datetime = new DateTime('now', new DateTimeZone($client_timezone));
        $datetime->setTimezone(new DateTimeZone('UTC'));
        $formatted_datetime = $datetime->format('Y-m-d H:i:s');
        return $formatted_datetime;
    }

    function getClientIpAddress()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipaddress;
    }
}
