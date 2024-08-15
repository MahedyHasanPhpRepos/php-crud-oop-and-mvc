
<?php

include('../interfaces/ValidationInterface.php');

class Validation implements ValidationInterface
{

    public function checkEmptyField($data, $fields)
    {
        $err_message = null;
        foreach ($fields as $field):
            if (empty($data[$field])):
                $err_message .= "<p class='error'>$field field is required!</p>";
            endif;
        endforeach;

        return $err_message;
    }

    public function isValidData($name)
    {

        $pattern = '/^[a-zA-Z][a-zA-Z0-9]*$/';
        return preg_match($pattern, $name);

        // if()){
        //     return false ; 
        // }
    }


    public function isValidEmail($email)
    {
        $valid_1 = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($valid_1) {
            return  preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $valid_1);
        }
    }

    public function isValidAge($age)
    {
        return is_numeric($age);
    }
}
