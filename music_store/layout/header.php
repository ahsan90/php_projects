<?php
/*
##################################################
Author: Md Ahsanul Hoque
Date: November 4, 2019
Purpose: Providing navigation menu for the website
##################################################
*/
$page = "navigationPanel.php";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./addAlbum.php">Music Store App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="./addAlbum.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./addAlbum.php">Add an Album</a>
            </li>
        </ul>
    </div>
</nav>
