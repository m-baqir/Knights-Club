<?php
use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\AboutUs;

require_once '../vendor/autoload.php';
$id = 0;
/*
if (isset($_SESSION['admin'])){

}*/
$isAdmin = true;
$dbConnection = Database::getDb();
$aboutUs = new AboutUs();
$result = '';
if (isset($_GET['id'])){
    echo 'GET[id] : '.$_GET['id'];
    $id = intval($_GET['id']);
    $result = $aboutUs->GetAboutUs($dbConnection);
}


if(isset($_POST['submitAboutUs'])){
    if (isset($_POST['id'])){
        $id=intval($_POST['id']);
    }
    if($aboutUs->CreateOrUpdateAboutUs($dbConnection,$_POST['content'],$id) != false){
        header("Location: aboutus.php");
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>About us</title>
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<main>
    <div class="container">
        <?php
        if ($isAdmin){
            $buttonShowUp = '<div class="row">
            <a href="aboutus.php';
            if ($result != false){
                $buttonShowUp .='?id='.$result->id;
            }
            $buttonShowUp.='" class="btn btn-primary">Back to about us page</a>
        </div>';
echo $buttonShowUp;
        }
        ?>
        <div class="row justify-content-center">
            <h1>Meet our team</h1>
        </div>
        <div class="row flex-grow-1">

            <form method="post" class="flex-grow-1">
                <input name="id" value="<?php echo $id?>" class="d-none">
                <div class="p-2 form-group">
                    <label for="content" class="p-2" style="vertical-align: top;">Content: </label>
                    <textarea name="content" id="content" class="p-2 flex-grow-1 form-control" rows="10" placeholder="the content of your message">
                        <?php
                        if($result != false){
                            echo $result->aboutus_content;
                        }

                        ?>
                    </textarea>

                </div>
                <div class="p-2">
                    <button class="btn btn-primary" type="submit" name="submitAboutUs">Submit</button>
                </div>
            </form>
            <p>

            </p>
        </div>
    </div>

</main>
<?php require_once('../home_page/footer.php'); ?>

</body>
</html>