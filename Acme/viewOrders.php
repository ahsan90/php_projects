<?php
/*
##################################################
    Author: Md Ahsanul Hoque
    Date: October 16, 2019
    Purpose: View the order listing
    Dependencies: N/A
##################################################
*/

$page = "View";
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
        <title>View Orders</title>
    </head>
    <body>
        <div id="container">
            <header>
                <?php include("navigationPanel.php")?>
            </header>
            <?php
            $fileName = "../veggie-orders.txt";
            //Open for reading
            $fp = fopen($fileName, 'r');

            if (!file_exists($fileName) || !$fp) {

                echo "<p>File not found</p>";


            }else{
                //Lock the file for reading (LOCK_SH - Shared)
                flock($fp, LOCK_SH);

                if (filesize($fileName) == 0){
                    echo "<h3 class='listingHeading mt-3 mb-3'>Sorry, there is no pending order!</h3>";
                }else{
                    ?>
                    <h1 class="listingHeading mt-3 mb-3"">Pending order listing</h1>
                    <table class='table-striped table-bordered table-hover'>
                        <?php
                        $tempOrderNo = 1;
                        while (!feof($fp)){
                            $tempLine = fgets($fp);
                                if (strlen($tempLine)>0){
                                    echo "<tr><td>".$tempOrderNo." - ".$tempLine."</td></tr>";
                                }
                             $tempOrderNo++;
                        }
                        ?>
                    </table>

                    <?php
                    echo "<p><a href=\"./resetOrders.php\"><span class=\"btn btn-danger mt-4 mb-3\">Reset Order</span></a></p>";
                }
            }

                fclose($fp);
            ?>

        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </body>
</html>