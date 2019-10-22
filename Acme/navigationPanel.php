<?php
    /*
    ##################################################
    Author: Md Ahsanul Hoque
    Date: October 3, 2019
    Purpose: Providing navigation menu for the website
    Dependencies: processVeggies.php, orderVegetables.php, resetOrders.php, viewOrder.php (found in same directory)
    ##################################################
    */
    $page = "navigationPanel.php";

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./orderVegetables.php">Acme International Inc.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="./orderVegetables.php">Shop <span class="<?php if ($page == "order") echo "current"; ?>"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewOrders.php">View Order <span class="<?php if ($page == "view") echo "current"; ?>"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./resetOrders.php">Reset Order <span class="<?php if ($page == "reset") echo "current"; ?>"></span></a>
            </li>
        </ul>
    </div>
</nav>
<!--Image credit: https://s3.grocerywebsite.com/production/slider_element_images/61067/original/HLClickCollect_1900x1250_Glider.jpg-->
<div><img src="./images/image.png" class="img-responsive"></div>
