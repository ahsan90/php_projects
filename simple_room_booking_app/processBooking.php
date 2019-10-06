<?php
require_once('Util.php');

/*
##################################################
    Author: Md Ahsanul Hoque
    Date: October 3, 2019
    Purpose: Process order from based on user input
    Dependencies:bookRoom.php (found in same directory)
##################################################
*/


//Declare variables
$firstName = "";
$lastName = "";
$postalCode = "";
$noOfAdults = 0;
$noOfChildren = 0;
$noOfNights=0;
$address = "";
$pet = false;

define("SALES_TAX", .15);


$hasInputError = false;

$errorString = "";

//Set using method=post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = test_input($_POST["fName"]);
    $lastName = test_input($_POST["lName"]);
    $postalCode = test_input($_POST["postalCode"]);
    $noOfAdults = test_input($_POST['adults']);
    $noOfChildren = test_input($_POST['children']);
    $noOfNights = test_input($_POST['noOfNights']);
    $address = test_input($_POST['address']);
}

//validate first name
if (empty($firstName)){
    $errorString = "<p class='alert-danger'>First name cannot be blank</p>";
    $hasInputError = true;
}

//Validate last name
if (empty($lastName)){
    $errorString .= "<p class='alert-danger'>Last name cannot be blank</p>";
    $hasInputError = true;
}

//Validate postal code
if (empty($postalCode)){
    $errorString .= "<p class='alert-danger'>Postal code cannot be blank</p>";
    $hasInputError = true;
}

//Validate address
if (empty($address)){
    $errorString .= "<p class='alert-danger'>Address field is required</p>";
    $hasInputError = true;
}

//validate number of adults input from user
if ($noOfAdults<=0 || empty($noOfAdults) || !is_numeric($noOfAdults)){

    $errorString .= "<p class='alert-danger'>The adult number cannot be negative or zero or empty</p>";

    $hasInputError = true;
}


//Allow the number of children to be empty but if not it must be whole number and cannot be negative
if(!empty($noOfChildren)){
    if (!is_numeric($noOfChildren) || $noOfChildren < 0){
        $errorString .= "Invalid children number";
        $hasInputError = true;
    }
}
//validate number of nights input from user
if (empty($noOfNights)){
    $hasInputError = true;
    $errorString .= "Has error with selecting nights";
}


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="./css/custom.css" rel="stylesheet">
        <title>Process Booking</title>
    </head>
    <body>
        <div id="bookingResult">
        <?php
            //If the form has input error let the user know giving link in form page
            if ($hasInputError){
            echo "<p class='alert-danger'>Form contains error. Please enter the missing information and try to resubmit</p>";
            echo "<p>".$errorString."</p>";
            echo "<a href='bookRoom.php'><< Go back</a>";
            }else{
        ?>
            <h1 class="mb-3">Booking Confirmation</h1>

            <div>
                <?php
                //Calculate the required result after all the input values are okay
                $unitRentalCost = 0;
                $grandTotal = 0;
                $taxAmount = 0;

                $unitRentalCost = 100*$noOfNights;

                if (isset($_POST['pet'])){
                    $unitRentalCost = $unitRentalCost + 50;
                }
                $taxAmount = $unitRentalCost * SALES_TAX;

                $grandTotal = $unitRentalCost + $taxAmount;

                $noOfPerson = $noOfAdults + $noOfChildren;


                date_default_timezone_set('America/Halifax');
                echo "<p>Welcome ".$firstName." ".$lastName."</p>";
                echo "<p>Postal code: ".$postalCode."</p>";
                echo "<p>Address: ".$address."</p>";
                echo "<p>No of Adults: ".$noOfAdults."</p>";
                echo "<p>No of children: ".$noOfChildren."</p>";
                echo isset($_POST['pet'])? "<p>$50 has been added for pet charge</p>" : "";
                echo "<p>Number of night/nights reserved: ".$noOfNights."</p>";
                echo $noOfPerson>8 ? "<p>Note: You have a large party, some guests may have to sleep on the floor</p>" : "";
                ?>
                <table class="table table-bordered mb-4 mt-4">
                    <thead>
                        <tr>
                            <th>
                                Rental Cost
                            </th>
                            <th>Tax Amount</th>
                            <th>Pet Charge</th>
                            <th>
                                Grand Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo "$". number_format($unitRentalCost,2)?>
                            </td>
                            <td>
                                <?php echo "$". number_format($taxAmount,2)?>
                            </td>
                            <td>
                                <?php echo isset($_POST['pet'])? "$".number_format(50,2) : "N/A"?>
                            </td>
                            <td>
                                <?php echo "$". number_format($grandTotal, 2)?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                //display the date and time of the booking confirmation
                echo '<P>Booking created at '.date('h:ia').' on '.date('F j\, Y').'</P>';
                }
                ?>
            </div>
        </div>
    </body>
</html>