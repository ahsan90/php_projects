<?php
require_once ('util.php');
spl_autoload_register(function ($class) {
    //include 'classes/' . $class . '.class.php';
    //include $class . '.php';
    include 'BusinessObjects/' .$class . '.class.php';
});
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Process form</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="./css/custom.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <?php include ('./layout/header.php'); ?> <br>
            <div  class="mainContent">

                <?php
                    //Declare local variables for capture form data values
                    $title = test_input($_POST['title']);
                    $artist = test_input($_POST['artist']);
                    $publisher = test_input($_POST['publisher']);
                    $genre = test_input($_POST['genre']);
                    $price = test_input($_POST['price']);
                    $countryReleased = test_input($_POST['country']);

                    $errorString = "";
                    $hasInputError = false;
                    //Check validation
                    if (FormValidation::isEmpty($title)){
                        $errorString .= getErrorString("Title");
                        $hasInputError = true;
                    }
                    if (FormValidation::isEmpty($artist)){
                        $errorString .= getErrorString("Artist name");
                        $hasInputError = true;
                    }
                    if (FormValidation::isEmpty($publisher)){
                        $errorString .= getErrorString("Publisher name");
                        $hasInputError = true;
                    }
                    if (FormValidation::isEmpty($genre)){
                        $errorString .= getErrorString("Genre name");
                        $hasInputError = true;
                    }

                    if (!FormValidation::isValidPrice($price)){
                        $errorString .= getErrorString("");
                        $hasInputError = true;
                    }
                    if (FormValidation::isEmpty($countryReleased)){
                        $errorString .= getErrorString("Country of release");
                        $hasInputError = true;
                    }
                    function getErrorString($propertyName){
                        return "<p class='alert alert-danger'>".$propertyName." ".FormValidation::getErrorText()."</p>";
                    }

                    if (!$hasInputError){
                        $newAlbum = new Album($title, $artist, $publisher, $genre);

                        //set values using magic methods
                        $newAlbum->$price = $price;
                        $newAlbum->$countryReleased = $countryReleased;

                        //echo toString method of album class
                        echo "<div class='content'>".$newAlbum->__toString();

                        //print values set by magic method
                        echo "<br/><b>Price: </b>$".number_format($newAlbum->$price,2);
                        echo "<br/><b>Country released: </b>".$newAlbum->$countryReleased;

                        echo "<br><p class='btn btn-default content'><a href='addAlbum.php'>Add another album!</a></p></div>";
                    }else{
                        echo $errorString;
                        echo "<p class='btn btn-default'><a href='addAlbum.php'>Try again</a></p>";
                    }
                ?>
            </div>

            <?php include ('./layout/footer.php'); ?>


        </div>
    </body>
</html>