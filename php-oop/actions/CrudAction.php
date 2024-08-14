<?php

include_once('../classes/DbConfig.php');





class CrudAction extends DbConfig
{

    public $conn ;

    public function __construct($dbInstance){
        $this->conn = $this->$dbInstance->getConnect();
    }


    public function getUsers()
    {
        $stmt = $this->conn->prepare("select * from Users");
        $stmt->execute();
        $users = $stmt->fetch();
        echo $users;
    }
}








// echo $v->exec("") ; 

// class CrudAction extends DbConfig
// {
//     public function __construct() {
//         parent::__construct() ; 
//     }
//     // echo $conn ; 

// }

// $cr = new CrudAction() ; 
// echo $cr ; 
