
<?php 

interface ValidationInterface{
    public function checkEmptyField($data , $fields) ; 
    public function isValidData($name) ; 
    public function isValidEmail($email) ; 
    public function isValidAge($age) ; 
}
