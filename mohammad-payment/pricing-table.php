<!--*bootstrap code borrowed from: https://codepen.io/chxlsonline/pen/KjRBaZ-->
<?php
session_start();
use Webappdev\Knightsclub\models\{Database,subscription};
require_once '../vendor/autoload.php';

$db = Database::getDb();
$b = new subscription();
$basic = $b->GetSubscriptionInfo(1,$db);
$intermediate = $b->GetSubscriptionInfo(2,$db);
$advance = $b->GetSubscriptionInfo(3,$db);
//var_dump($basic);
//just as an example using fake session variable
$username = $_SESSION["username"];

//if user clicks the order button the appropriate funciton is called to update the user table>subscription_type column
if (isset($_POST['order5'])){
    (new Webappdev\Knightsclub\models\User)->userorder5($username, $db);
}
elseif (isset($_POST['order10'])){
    (new Webappdev\Knightsclub\models\User)->userorder10($username, $db);
}
elseif (isset($_POST['order15'])){
    (new Webappdev\Knightsclub\models\User)->userorder15($username, $db);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/pricing-table.css" />
    <link rel="stylesheet" href="../css/style_template.css" />
    <title>Pricing table</title>
</head>

<body>
<?php require_once('../home_page/header.php'); ?>

<!-- pricing -->
<div id="pricing">
    <div class="container py-4">
        <div class="row">
            <div class="col text-center my-4">
                <h2 class="">Pricing</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="card border-success text-center">
                    <h4 class="card-header text-white bg-success py-4"><?=$basic->type;?></h4>
                    <div class="card-body">
                        <h5 class="card-title display-4"><span class="currency">$</span><?=$basic->price;?><span class="period">/
                                    month </span></h5>
                        <ul class="list-group list-group-flush lead">
                            <li class="list-group-item"><?=$basic->search_type;?> Search</li>
                            <li class="list-group-item">View Profiles</li>
                            <li class="list-group-item"><?=$basic->community_posts;?> Community Posts</li>
                            <li class="list-group-item"><?=$basic->personal_messages;?> Personal Messages</li>
                        </ul>
                        <form action="paypal.php" method="post">
                            <input type="hidden" name="price" value="<?=$basic->price;?>"/>
                        <input type="submit" name="order5" class="btn btn-success mt-4" style="margin-bottom: 0.5em;"/>
                        </form>
                        <!--*Paypal button-->
                        <script src="https://www.paypalobjects.com/api/button.js?" data-merchant="braintree"
                                data-id="paypal-button" data-button="checkout" data-color="gold" data-size="medium"
                                data-shape="pill" data-button_type="submit" data-button_disabled="false"></script>
                        <!-- Configuration options:
                        data-color: "blue", "gold", "silver"
                        data-size: "tiny", "small", "medium"
                        data-shape: "pill", "rect"
                        data-button_disabled: "false", "true"
                        data-button_type: "submit", "button"
                        --->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 mb-4">
                <div class="card text-center">
                    <h4 class="card-header text-white bg-primary py-4"><?=$intermediate->type;?></h4>
                    <div class="card-body">
                        <h5 class="card-title display-4"><span class="currency">$</span><?=$intermediate->price;?><span class="period">/
                                    month </span></h5>
                        <ul class="list-group list-group-flush lead">
                            <li class="list-group-item"><?=$intermediate->search_type;?> Search</li>
                            <li class="list-group-item">View Profiles</li>
                            <li class="list-group-item"><?=$intermediate->community_posts;?> Community Posts</li>
                            <li class="list-group-item"><?=$intermediate->personal_messages;?> Personal Messages</li>
                        </ul>
                        <form action="paypal.php" method="post">
                            <input type="hidden" name="price" value="<?=$intermediate->price;?>"/>
                        <input type="Submit" name="order10" class="btn btn-primary mt-4" style="margin-bottom: 0.5em;"/>
                        </form>
                        <!--*Paypal button-->
                        <script src="https://www.paypalobjects.com/api/button.js?" data-merchant="braintree"
                                data-id="paypal-button" data-button="checkout" data-color="gold" data-size="medium"
                                data-shape="pill" data-button_type="submit" data-button_disabled="false"></script>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 mb-4">
                <div class="card text-center">
                    <h4 class="card-header text-white bg-primary py-4"><?=$advance->type;?></h4>
                    <div class="card-body">
                        <h5 class="card-title display-4"><span class="currency">$</span><?=$advance->price;?><span class="period">/
                                    month</span></h5>
                        <ul class="list-group list-group-flush lead">
                            <li class="list-group-item"><?=$advance->search_type;?> Search</li>
                            <li class="list-group-item">View Profiles</li>
                            <li class="list-group-item"><?=$advance->community_posts;?> Posts</li>
                            <li class="list-group-item"><?=$advance->personal_messages;?> Personal Messages</li>
                        </ul>
                        <form action="paypal.php" method="post">
                            <input type="hidden" name="price" value="<?=$advance->price;?>"/>
                         <input type="submit" name="order15" class="btn btn-primary mt-4" style="margin-bottom: 0.5em;"/>
                        </form>
                        <!--*Paypal button-->
                        <script src="https://www.paypalobjects.com/api/button.js?" data-merchant="braintree"
                                data-id="paypal-button" data-button="checkout" data-color="gold" data-size="medium"
                                data-shape="pill" data-button_type="submit" data-button_disabled="false"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<?php require_once('../home_page/footer.php'); ?>

</body>

</html>
