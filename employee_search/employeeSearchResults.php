<?php
// Author Hoque in November 29, 2019
// Date: November 27, 2019
// Purpose: Displaying the search results

?>
<?php
//declare local variables
$fName = "";
$lName = "";
$limit = "";
$orderBy = "";
$orderBy_ascOrDsc = "";
$countRow = 0;

$db = new mysqli('localhost', 'root', '', 'cis2288');

$fName = $db->real_escape_string($_GET['fName']);
$lName = $db->real_escape_string($_GET['lName']);
$limit = $db->real_escape_string($_GET['limit']);
$orderBy = $db->real_escape_string($_GET['orderBy']);
$orderBy_ascOrDsc = $db->real_escape_string($_GET['orderBy_ascOrDsc']);
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
        <title>Search Result</title>
    </head>
    <body>

    <?php
    // if mysqli_connect_errno() is set, we did not successfully connect. Here we deal with the error.
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.</body></html>';
        exit;
    }

    $searchCondition = "";
    //Prepare the mysql condition based on filter from employeeSearch.php page
    if ((!empty($fName) && $fName != "") || (!empty($lName) && $lName != "")){
        if ((!empty($fName) && $fName != "") && (!empty($lName) && $lName != "")){
            $searchCondition = 'WHERE FIRST_NAME LIKE "%'.$fName.'%" && '.'LAST_NAME LIKE "%'.$lName.'%"';
        }
        elseif (!empty($fName) && $fName != ""){
            $searchCondition = 'WHERE FIRST_NAME LIKE "%'.$fName.'%"';
        }
        elseif (!empty($lName) && $lName != ""){
            $searchCondition = 'WHERE LAST_NAME LIKE "%'.$lName.'%"';
        }
        else{
            $searchCondition = "";
        }
    }


    $query = 'SELECT EMP_ID, FIRST_NAME, LAST_NAME, START_DATE FROM employee '.$searchCondition.' ORDER BY '.$orderBy.' '.$orderBy_ascOrDsc.' LIMIT '.$limit;

    // Here we 'get' the num_rows attribute of our $result object - this is key to knowing if we should show the results or
    $result = $db->query($query);

    // display an error message if
    $num_results = $result->num_rows;

    ?>
        <div id="employeeArea" class="">
            <h2>Search Results</h2>

            <?php
            //echo '<p>'.$lName.", ".$fName.", ".$limit.", ".$orderBy.'</p>';
            if ($num_results>0){
                echo "<h4 class='mb-3'>Total records found: $num_results</h4>";
                $employees = $result->fetch_all(MYSQLI_ASSOC);
                echo "<table class='table'><tr>";
                echo "<th>Employee ID</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Start Date</th>";
                echo "</tr>";


                foreach ($employees as $employee){
                    $countRow++;
                    $countRow%2==0? $zebraEffect = "even" : $zebraEffect = "odd";
                    echo "<tr class='$zebraEffect'>";
                        foreach ($employee as $k => $v) {
                            echo "<td>" . $v. "</td>";

                        }
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "<div class='mt-4'><p class='alert alert-warning'>No records found....!!!</p></div>";
            }
            echo '<a href="./employeeSearch.php" class="btn btn-primary mb-3">Search Again</a>';


            ?>
            <div class="footer">
                <p>Copyright &copy;<?php echo date("Y") ?> by Md Ahsanul Hoque (Canada)</p>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
    //reset searchCondition
    $searchCondition = "";
    //Reset countRow
    $countRow = 0;
    // Here we run the free() method on the $result object - this frees up memory on our server
    $result->free();
    // Here we disconnect our connection to the DB
    $db->close();
    ?>
    </body>
</html>