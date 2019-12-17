<?php
// Updated by: Don Bowers,jdkitson further modification by Md Ahsanul Hoque
// Date: November 22, 2019
// Purpose: Demo DB and PHP deleting(post operation) with PHP

// Include config file


require ('./auth/LoginHelper.php');

if (LoginHelper::isLoggedIn()) {

require_once("../lib/config.php");
$bookId = "";
$msg = "";
// Process delete operation after confirmation
if (isset($_GET["bookId"]) && !empty($_GET["bookId"])) {
    //Sanitize the parameter
    $bookId = $mysqli->real_escape_string($_GET['bookId']);
    // example UPDATE query
    $query = "DELETE FROM books WHERE books.id =$bookId ";
    $result = $mysqli->query($query);

    if ($result) {
        $msg = "Record deleted successfully. ".$mysqli->affected_rows . " book deleted from database. <a href='manageBooks.php'>View all Books</a>";

    } else {
        $msg = "Error deleting record: " . $mysqli->error;
    }

    $mysqli->close();

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Record</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../css/custom.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="../index.php">Bookorama Management Application</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="">
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

            <h2>CIS Book Inventory</h2>
            <p class="error"><?php echo $msg ?></p>

            <?php include ('../layout/footer.php') ?>

        </div>
    </body>
</html>
    <?php
}else{
    header('Location: ./auth/login.php');
}
?>