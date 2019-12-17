<?php
/*
##################################################
Author: Md Ahsanul Hoque
Date: November 4, 2019
Purpose: performs validations for addAlbum.php form
##################################################
*/

class FormValidation
{
    static private $errorText;

    /**
     * @return mixed
     */
    public static function getErrorText()
    {
        return self::$errorText;
    }
    //Check if the the field is empty
    public static function isEmpty($input){
        if (empty($input) || $input == ""){
            self::$errorText = "cannot be empty!";
            return true;
        }else{
            return false;
        }
    }
    //Check if the price is valid
    public static function isValidPrice($price){
        if (empty($price) || !is_numeric($price) || $price<0) {
            self::$errorText = "Please enter a valid price";
            return false;
        }else{
            return true;
        }
    }

}