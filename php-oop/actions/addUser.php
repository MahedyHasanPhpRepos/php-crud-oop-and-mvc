
<?php
    

    include_once('../classes/DbConfig.php') ; 
    $dbConnect = new DbConfig() ; 
    echo $dbConnect->getConnect() ; 

    if(isset($_POST['submit'])){
    
        $name = $_POST['name']; 
        $age = $_POST['email']; 
        $email = $_POST['age']; 
        $date = $_POST['date']; 


        echo $name . "\t" . $age ."\t". $email . "\t". $date . '\n' ;

    }
