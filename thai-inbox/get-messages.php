<?php
use Webappdev\Knightsclub\models\Message;
use Webappdev\Knightsclub\models\Database;

require_once '../vendor/autoload.php';

$dbConnection = Database::getDb();
$message = new Message();
$messages = $message->getMessages($dbConnection);
//var_dump($messages);//for Debug

foreach ($messages as $msg)
{
    $bold = "";
    if($msg->is_read === "0")
    {
        $bold = "font-weight-bold";
    }
    $appearText = '<li class="py-2 bd-highlight list-group-item">
                                <div class="d-flex flex-row bd-highlight align-items-center">
                                    <div class="p-2 bd-highlight">
                                        <input type="checkbox">
                                    </div>
                                    <!--                                                <div class="p-2 flex-grow-1 bd-highlight position-relative">-->
                                    <div class="d-flex flex-column flex-md-row bd-highlight align-items-center flex-grow-1 position-relative">';
    $appearText.='<div class="p-md-2 bd-highlight '.$bold.'">';

    $appearText.= $msg->senderName;
    $appearText.= '</div><div class="p-md-2 flex-grow-1 bd-highlight text-truncate '.$bold.'">';
    $appearText.= $msg->subject;
    $appearText.= '<a href="message_content.php?id='.$msg->id.'" class="p-0 stretched-link bd-highlight"></a>';
    $appearText.= '<div class="p-md-2 bd-highlight text-right">'.$msg->date.'</div></div></div></li>';
    echo $appearText;
}