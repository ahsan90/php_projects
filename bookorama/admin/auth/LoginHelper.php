
<?php
// Class name: LoginHelper
// Written by: Md Ahsanul Hoque
// Date: November 22, 2019
// Purpose: provide functionlity to whether the user logged in or not


session_start();
class LoginHelper
{
    public static function isLoggedIn(){
		if(!isset($_SESSION['isLoggedIn'])){
			$_SESSION['isLoggedIn'] = false;
		}
		
        if ($_SESSION['isLoggedIn']){
            return true;
        }
        else{
            return false;
        }
    }

//    public static function isUserFound($userName, $password){
//        require_once ('../../dataLayer/UserRepository.php');
//        $foundUser = UserRepository::findByUserNameAndPassword($userName, $password);
//        if ($foundUser != null){
//            return true;
//        }else{
//            return false;
//        }
//
//    }

}