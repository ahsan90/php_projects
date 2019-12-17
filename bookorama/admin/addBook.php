<?php
// Updated by: Don Bowers,jdkitson further modification by Md Ahsanul Hoque
// Date: November 22, 2019
// Purpose: Demo DB and PHP inserting - editing with PHP


$pageTitle = "login.php";
require ('./auth/LoginHelper.php');

if (LoginHelper::isLoggedIn()){

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet">
        <title>Add book</title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="../index.php">Bookorama Management Application</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link loggedIn-text"><?php echo "| Logged In as- ".$_SESSION['sessionUserName']; ?></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <h1>Book-O-Rama Book - Add Book</h1>
            <?php
            require_once("../lib/utilities.php");
            if (isset($_POST['submit'])) {

                // create short variable names
                $isbn = test_input($_POST['isbn']);
                $author = test_input($_POST['author']);
                $title = test_input($_POST['title']);
                $price = test_input($_POST['price']);

                if (empty($isbn) || empty($author) || empty($title) || empty($price)) {

                    header("location:newBook.php?error=empty");
                    exit();

                }
                //Create DB object
                //require_once('../lib/config.php');


                /* Database credentials. Assuming you are running MySQL
                server with default setting (user 'root' with no password) */
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'web_only_user');
                define('DB_PASSWORD', 'web_secret_password');
                define('DB_NAME', 'books');

                /* Attempt to connect to MySQL database */
                $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
                if ($mysqli === false) {
                    die("ERROR: Could not connect. " . $mysqli->connect_error);
                }

                $isbn = $mysqli->real_escape_string($isbn);
                $author = $mysqli->real_escape_string($author);
                $title = $mysqli->real_escape_string($title);
                $price = $mysqli->real_escape_string(doubleval($price));

                //$values = "'".$isbn."',"."'".$author."',".$title."',".$price."'";

                if (mysqli_connect_errno()) {
                    echo "Error: Could not connect to database.  Please try again later.";
                    exit;
                }

                $query = "INSERT INTO books VALUES (NULL,'" . $isbn . "', '" . $author . "', '" . $title . "', " . $price . ")";
                //$query = "INSERT INTO books VALUES (NULL,". $values.")";
                //echo $query;
                $result = $mysqli->query($query);

                if ($result) {
                    echo "<p class='alert alert-success'>".$mysqli->affected_rows . " book inserted into database. <a href='./newBook.php'>Add another?</a></p>";

                    //Display book inventory
                    $query = "SELECT * FROM books";
// Here we use our $mysqli object created above and run the query() method. We pass it our query from above.
                    $result = $mysqli->query($query);

                    $num_results = $result->num_rows;

                    echo "<p>Number of books found: " . $num_results . "</p>";

                    echo "<h2>CIS Book Inventory</h2>";
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                    if ($num_results > 0) {
//  $result->fetch_all(MYSQLI_ASSOC) returns a numeric array of all the books retrieved with the query
                        $books = $result->fetch_all(MYSQLI_ASSOC);
                        echo "<table class='table table-bordered'><tr>";

//This dynamically retrieves header names
                        foreach ($books[0] as $k => $v) {
                            echo "<th>" . $k . "</th>";
                        }
                        echo "</thead>";
                        echo "<tbody>";
//Create a new row for each book
                        foreach ($books as $book) {
                            echo "<tr>";

                            foreach ($book as $k => $v) {

                                echo "<td>" . $v . "</td>";

                            }
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    }
                    $result->free();
                    $mysqli->close();
                } else {
                    echo "<p class='alert alert-danger'> An error has occurred.  The item was not added. <a href='./newBook.php'>Try again?</a></p>";
                }

            } else {

                header("location:addBook.php?error=noform");
                exit();
            }
            //echo "queryResult: ".$result;
            //echo $isbn. ", ". $title . ", " . $author . ", " . $price;
            ?>

        <?php include ('../layout/footer.php') ?>
        <script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
        </div>
    </body>
</html>

    <?php
}else{
    header('Location: ./auth/login.php');
}
?>
