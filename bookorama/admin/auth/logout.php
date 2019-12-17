<?php
// Written by: Md Ahsanul Hoque
// Date: November 22, 2019
// Purpose: provides the user to logout


session_start();
session_unset();


session_destroy();
header("Location: ../../index.php");
die();
