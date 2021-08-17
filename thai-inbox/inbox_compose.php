<?php
use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Message;
use Webappdev\Knightsclub\models\User;
require_once '../vendor/autoload.php';
session_start();
if(isset($_POST['sendMessage'])){
    $dbConnection = Database::getDb();
    $user = new User();
    $receiverId = $user->getUserIdByUserName($_POST['receiver'],$dbConnection);
    $message = new Message();
    //hard code senderId to test. It should be current logged-in user's id
    $userId = 0;
    if(isset($_SESSION['id'])){
        $userId = $_SESSION['id'];
    }
    if($message->sendMessage($userId, $receiverId->id,$_POST['subject'], $_POST['content'],$dbConnection))
    {
        echo 'sent message successfully to '.$receiverId->id;
    }
    else{
        echo 'failed to send message to '.$receiverId->id;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../css/style_template.css"/>
        <link rel="stylesheet" href="css/style_compose.css"/>
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
    <main>
        <div class="container">
            <div class="row border-top border-bottom">
                <div class="col-4" id="inbox_control_bar">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Compose</li>
                            <li class="list-group-item position-relative"><a href="inbox.php" class="stretched-link"></a>Inbox</li>
                            <li class="list-group-item position-relative"><a href="inbox.php?controlType=2" class="stretched-link"></a>Sent</li>
                            <li class="list-group-item position-relative"><a href="inbox.php?controlType=3" class="stretched-link"></a>Trash</li>
                        </ul>
                    </div>
                    
                </div>
                <form class="flex-grow-1" method="POST">
                    <div class="p-2" id="mobile_close_new_message">
                        <!--Only display in mobile-->
                        <a id="closebtn" class="btn btn-primary" href="Inbox.php">Close</a>
                    </div>
                    <div class="p-2 form-group">
                        <label for="receivers" class="p-2">Receiver(s): </label>
                        <input name="receiver" id="receivers" placeholder="the receiver of your message" class="p-2 flex-grow-1 form-control "/>
                    </div>
                    <!--<div class="p-2 d-flex flex-row">-->
                    <div class="p-2 form-group">
                        <label for="subject" class="p-2">Subject: </label>
                        <input name="subject" id="subject" placeholder="the subject of your message" class="p-2 flex-grow-1 form-control"/>
                    </div>

                    <div class="p-2 form-group">
                        <label for="content" class="p-2" style="vertical-align: top;">Content: </label>
                        <textarea name="content" id="content" class="p-2 flex-grow-1 form-control" rows="10" placeholder="the content of your message"></textarea>
                        
                    </div>
                    <div class="p-2">
                        <button class="btn btn-primary" type="submit" name="sendMessage">Send</button>
                    </div>
                </form>
                <!--
                <div class="col-6">
                    content of a particular message
                </div>
                -->
            </div>
        </div>
    </main>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>