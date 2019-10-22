<?php
/*
 * Author: Md Ahsanul Hoque
 * Date: October 16, 2019
 * Purpose: Order vegetable form for taking order from customer
 * Dependencies:processVeggies.php (found in same directory)
 */
$page = "order";
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
        <title>Acme International Inc.</title>
    </head>
    <body>
        <div id="container">
            <div class="content mb-5">
                <header>
                    <?php include("navigationPanel.php")?>
                </header>
                <!--Heading-->
                <h2>Welcome to Acme International Inc.</h2>
                <div class="row">
                    <div class="col-lg-2 col-md-2 "></div>
                    <div class="col-lg-8 col-md-8">
                        <!--Form elements-->
                        <form action="processVeggies.php" method="GET">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Phone number" name="phoneNumber">
                            </div>
                            <!--Potatoes-->
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <label class="form-check-label" for="potatoes">Potatoes(5 lb - $6.00 each)</label>
                                </div>
                                <div class="form-group col-lg-4">
                                    <select class="custom-select" id="" name="potatoesQty">
                                        <?php for ($i = 0; $i<=30; $i++)
                                            echo "<option value=$i>".$i."</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                            <!--Carrots-->
                            <div class="row mt-2">
                                <div class="col-lg-4">
                                    <label class="form-check-label" for="exampleCheck1">Carrots(3 lb - $3.75 each)</label>
                                </div>
                                <div class="form-group col-lg-4">
                                    <select class="custom-select" id="" name="carrotsQty">
                                        <?php for ($i = 0; $i<=30; $i++)
                                            echo "<option value=$i>".$i."</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                            <!--Cauliflower   -->
                            <div class="row mt-2">
                                <div class="col-lg-4">
                                    <label class="form-check-label" for="cauliflower">Cauliflower(1 - $4.00 each)</label>
                                </div>
                                <div class="form-group col-lg-4">
                                    <select class="custom-select" id="" name="cauliflowerQty">
                                        <?php for ($i = 0; $i<=30; $i++)
                                            echo "<option value=$i>".$i."</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
                </div>
                <div class="col-lg-2 col-md-2 ">

                </div>

            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </body>
</html>