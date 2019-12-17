<?php

// Date: Nov 17, 2019
// Last Edited by: Md Ahsanul Hoque
// Purpose: Let the user to enter data in the form for adding a book

require ('./auth/LoginHelper.php');

if (LoginHelper::isLoggedIn()) {

    ?>
    <!doctype html>
    <html>
    <head>
        <title>Add New Book Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../css/custom.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <body>
    <div class="container">
        <?//php include  ('../layout/footer.php')
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php">Bookorama Management Application</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <h1>Book-O-Rama - New Book Entry</h1>
        <form action="addBook.php" method="post" class="form-content">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Book-O-Rama - New Book Entry</legend>
                <?php
                $msg = "";

                if (isset($_GET["error"])) {

                    if ($_GET["error"] == 'empty') {

                        $msg = "You have not entered all the required details.";
                    } else if ($_GET["error"] == 'db') {

                        $msg = "DB error.Book not added.";
                    } else if ($_GET["error"] == 'noform') {

                        $msg = "You must fill out a new book form.";
                    }

                }
                if ($msg != ""){
                    echo "<p class='alert alert-danger'>$msg</p>";
                }
                ?>

                <div class="form-group">
                    <label for="isbn">ISBN (format 0-672-31509-2):</label>
                    <input type="text" class="form-control" id="isbn" placeholder="Enter book isbn" name="isbn">
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" id="author" placeholder="Enter book author" name="author">
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter book title" name="title">
                </div>
                <div class="form-group">
                    <label for="price">Price $</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter book price" name="price">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add Book">
                </div>
            </fieldset>
        </form>
        <?php include('../layout/footer.php') ?>
    </div>
    <script src="../js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}else{
    header('Location: ./auth/login.php');
}
?>