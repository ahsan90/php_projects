<?php
// Updated by: Don Bowers,jdkitson further modification by Md Ahsanul Hoque in November 29, 2019
// Date: November 22, 2019
// Purpose: Managing books(CRUD Operation)


require ('./auth/LoginHelper.php');

if (LoginHelper::isLoggedIn()) {
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/custom.css" rel="stylesheet">
        <title>Bookorama Application</title>
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
                            <a class="nav-link" href="./manageBooks.php">Admin Panel</a>
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
            <div class="main-content">
                <div class="admin">

                    <?php
                    // set up connection
                    require("../lib/config.php");

                    //Sort type
                    if (isset($_GET['author'])){
                        $sortedBy = " author asc";
                    }
                    elseif (isset($_GET['price'])){
                        $sortedBy = " price asc";
                    }else{
                        $sortedBy = " title asc";
                    }
                    $sort = " order by".$sortedBy;

                    //Display book inventory
                    $query = "SELECT id,isbn,author,title,price FROM books".$sort;

                    // Here we use our $db object created above and run the query() method. We pass it our query from above.
                    $result = $mysqli->query($query);

                    $num_results = $result->num_rows;
                    if(isset($_GET['msg'])) {
                        echo "<p>{$_GET['msg']}</p>";
                    }
                    echo "<p>Number of books found: " . $num_results . "</p>";
                    echo "<h2>CIS Book Inventory: Admin Panel</h2>";



                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    if ($num_results > 0) {
                //  $result->fetch_all(MYSQLI_ASSOC) returns a numeric array of all the books retrieved with the query
                        $books = $result->fetch_all(MYSQLI_ASSOC);
                        echo "<table class='table table-bordered'><tr>";
                //This dynamically retieves header names
                        foreach ($books[0] as $k => $v) {

                            //echo "<th>" . ucwords($k) . "</th>";
                            if ($k=='author'){
                                echo "<th><a href='./manageBooks.php?author=".urldecode($k)."'>" . ucwords($k) . "<span>&#94;</span></a></th>";
                            }
                            elseif ($k=='price'){
                                echo "<th><a href='./manageBooks.php?price=".urldecode($k)."'>" . ucwords($k) . "<span>&#94;</span></a></th>";
                            }
                            else{
                                echo "<th>" . ucwords($k) . "</th>";
                            }

                        }

                        echo "<th>Actions</th>";

                        echo "</tr></thead>";
                        echo "<tbody>";
                //Create a new row for each book
                        foreach ($books as $book) {
                            echo "<tr>";
                            $i = 0;

                            foreach ($book as $k => $v) {

                                if ($k == 'id') {
                                    echo "<td>" . $v . "</td>";
                                    $bookId = $v;
                                } else {
                                    echo "<td>" . $v . "</td>";
                                }
                                if (($i == count($book) - 1)) {
                                    echo "<td>";
                                    echo "<div class='btn-toolbar'>";
                                    echo "<a href='./edit.php?bookId=" . $bookId . "' title='Edit Record' class='btn btn-warning btn-xs btnMargin' data-toggle='tooltip'><i class='fa fa-edit'></i></a>";
                                    echo "<a href='./delete.php?bookId=" . $bookId . "' title='Delete Record' class='btn btn-danger btn-xs' data-toggle='tooltip'><i class='fa fa-trash'></i></a>";
                                    echo "</div>";
                                    echo "</td>";
                                }
                                $i++;
                            }
                            echo "</tr>";

                        }

                        echo "<tr><td colspan='6'>";
                        echo "<a href='./newBook.php' title='View Record' class='btn btn-primary' data-toggle='tooltip'><i class='fa fa-plus-circle'></i>Add a New Book</a>";
                        echo "</td></tr>";

                        echo "</tbody>";
                        echo "</table>";
                    }
                    // free result and disconnect
                    $result->free();
                    $mysqli->close();

                    ?>
                </div>
            </div>
                <?php include ('../layout/footer.php')?>
        </div>
        <script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>

<?php
}else{
    header('Location: ./auth/login.php');
}
?>