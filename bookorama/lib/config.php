<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'web_only_user');
define('DB_PASSWORD', 'web_secret_password');
define('DB_NAME', 'books');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli == false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
