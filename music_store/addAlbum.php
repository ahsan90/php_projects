<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My Music Store</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="./css/custom.css" rel="stylesheet">
    <body>
    </head>
        <div id="container">
            <?php include ('./layout/header.php');?><br>
            <form class="mainContent" action="process.php" method="post">
                <div class="form-group">
                    <label for="Album">Album Title</label>
                    <input type="album" class="form-control" id="album" placeholder="Enter title" name="title">
                </div>
                <div class="form-group">
                    <label for="artist">Artist</label>
                    <input type="text" class="form-control" id="artist" placeholder="Artist" name="artist">
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control" id="publisher" placeholder="Publisher" name="publisher">
                </div>
                <div class="form-group">
                    <label for="publisher">Genre</label>
                    <input type="text" class="form-control" id="publisher" placeholder="Genre" name="genre">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                </div>
                <div class="form-group">
                    <label for="country">Country of release</label>
                    <input type="text" class="form-control" id="country" placeholder="Country of release" name="country">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </form>
            <?php include ('./layout/footer.php'); ?>
        </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>