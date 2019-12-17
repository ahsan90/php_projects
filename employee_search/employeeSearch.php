<?php
// Author Hoque in November 29, 2019
// Date: November 27, 2019
// Purpose: Provide the ability to search contents from mysql database through filtering

$db = new mysqli('localhost', 'root', '', 'cis2288');
    // if mysqli_connect_errno() is set, we did not successfully connect. Here we deal with the error.
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.</body></html>';
        exit;
    }
    $query = 'SELECT * FROM employee';
    $result = $db->query($query);

    // store the number of rows in a variable
    $num_results = $result->num_rows;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="./css/custom.css" rel="stylesheet" type="text/css">
        <title>Employee Search</title>
    </head>
    <body>
        <div id="employeeArea" class="container">
        <fieldset class="scheduler-border mt-5">
            <legend class="scheduler-border">Employee Search</legend>
            <form action="employeeSearchResults.php" method="get">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" aria-describedby="emailHelp" placeholder="Enter first name" name="fName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Enter first name" name="lName">
                </div>
                <div class="form-group">
                    <label>Limit</label>
                    <select class="form-control" name="limit">
                        <option value=2>2</option>
                        <option selected=5>5</option>
                        <option value=10>10</option>
                        <option value=15>15</option>
                        <option value="<?php echo $num_results?>"><?php echo 'All('.$num_results.')'?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Order By</label>
                    <select class="form-control" name="orderBy">

                        <option value="EMP_ID">Employee ID</option>
                        <option value="FIRST_NAME">First Name</option>
                        <option value="LAST_NAME" selected="LAST_NAME">Last Name</option>
                        <option value="START_DATE">Start Date</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ascending/Descending</label>
                    <select class="form-control" name="orderBy_ascOrDsc">
                        <option value="ASC" selected="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4 mb-4 btn-block">Search</button>
            </form>
        </fieldset>
            <div class="footer">
                <p>Copyright &copy;<?php echo date("Y") ?> by Md Ahsanul Hoque (Canada)</p>
            </div>
        </div>
    <?php
    // Here we run the free() method on the $result object - this frees up memory on our server
    $result->free();
    // Here we disconnect our connection to the DB
    $db->close();
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>