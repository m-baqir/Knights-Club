<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d77bd3435b.js" crossorigin="anonymous"></script>
    <!--        <link rel="stylesheet" href="../css/style_template.css"/>-->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <script src="js/handler.js"></script>
    <title>search page</title>
</head>
<body>
<?php require_once('..\home_page\header.php') ?>
<main class="d-flex flex-column">
    <form action="" method="get" class="form-group d-flex flex-row justify-content-center">
        <label for="search" class="text-hide">
            search
        </label>
        <input id="search" name="search" class="form-control bd-highlight flex-shrink-0 m-1">
        <button class="btn btn-primary bd-highlight form-control m-1">Search</button>
    </form>
    <div class="justify-content-center">
        <div class="d-flex flex-wrap">
            <div class="card flex-grow-1 m-2" style="width: 18rem;">
                <img src="PaulScholes.jpg" class="card-img-top img-thumbnail img-size" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Paul Scholes</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Make friend</a>
                </div>
            </div>
            <div class="card flex-grow-1 m-2" style="width: 18rem;">
                <img src="GaryNeville.jpg" class="card-img-top img-thumbnail img-size" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Gary Neville</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Make friend</a>
                </div>
            </div>
            <div class="card flex-grow-1 m-2" style="width: 18rem;">
                <img src="JadonSancho.jpg" class="card-img-top img-thumbnail img-size" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Jadon Sancho</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Make friend</a>
                </div>
            </div>
            <div class="card flex-grow-1 m-2" style="width: 18rem;">
                <img src="HarryKane.jpg" class="card-img-top img-thumbnail img-size" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Harry Kane</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Make friend</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="LukeShaw.jpg" class="card-img-top img-thumbnail img-size" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Luke Shaw</h5>
                    <p class="card-text text-sm-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Make friend</a>
                </div>
            </div>
        </div>

    </div>
</main>

<?php require_once('..\home_page\footer.php') ?>

</body>
</html>