<?php
require_once ('Util.php');

/*
##################################################
    Author: Md Ahsanul Hoque
    Date: October 3, 2019
    Purpose: Booking form for renting a typical cottage
    Dependencies: NA
##################################################
*/

//Define constant
define("RENTAL_COST", 100);


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Room booking Application</title>
        <link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="./css/custom.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="bookingForm">
            <h1>Booking Form</h1>
            <img src="./images/Cottage.png" class="mb-4 img-fluid">
            <div class="mainContent">
                <form action="processBooking.php" method="post">

                    <p class="alert-info"><?php echo 'Unit rental cost is $' .RENTAL_COST."/night"?></p>
                    <!--textbox for first name-->
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter First name">
                    </div>
                    <!--textbox  for last name-->
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lName" name="lName" placeholder="Enter Last name">
                    </div>
                    <!-- textbox  for postal code-->
                    <div class="form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode"
                               placeholder="Enter your postal code">
                    </div>
                    <!--textbox for no of adults-->
                    <div class="form-group">
                        <label for="adults">Number of adults</label>
                        <input type="text" class="form-control" id="adults" name="adults" placeholder="Number of adults">
                    </div>

                    <!--Text box for children-->
                    <div class="form-group">
                        <label for="children">Number of children</label>
                        <input type="text" class="form-control" id="children" name="children" placeholder="Number of children">
                    </div>
                    <!--textbox for address-->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" rows="4" name="address"
                                  placeholder="Enter your address please..."></textarea>
                    </div>
                    <!--Checkbox for pets-->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="pet" name="pet">
                        <label class="form-check-label" for="pet">Has a pet? (If so $50 will be charged as extra)</label>
                    </div>

                    <!--Select night-->
                    <div class="input-group mb-3 mt-2">
                        <select class="custom-select" id="" name="noOfNights">
                            <option value="">Select how many nights you wanna stay</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </body>

</html>