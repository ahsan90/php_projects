<?php
/*
##################################################
    Author: Md Ahsanul Hoque
    Date: October 16, 2019
    Purpose: Resetting orders stored in file location
    Dependencies: N/A
##################################################
*/

$page = "reset";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/custom.css">
    <title>Reset Orders</title>
</head>
<body>
    <div id="container">
        <?php include ("navigationPanel.php");?>
        <div class="">
            <?php
            $fileName = "../veggie-orders.txt";

            if (!file_exists($fileName)) {
                echo "<p>File not found</p>";
            }else{


                if (filesize($fileName) == 0){
                    echo "<h2 class='mt-4'>Sorry, there is no pending order to reset!</h2>";
                }else{
                    //Open the file in writemode and delete all the contents in it
                    $fp = fopen($fileName, 'w');
                    fclose($fp);
                    echo "<h2>The listing order has ben reset successfully</h2>";
                    echo "<p class='listingHeading mb-3'><a href='./orderVegetables.php' class='btn btn-primary'>Continue shopping</a></p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>