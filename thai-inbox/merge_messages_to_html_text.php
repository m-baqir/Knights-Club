<?php
/**
 * Convert a list of messages to a string with HTML format
 * @param $messages 1 list of objects to be converted to HTML text
 * @param $controlType 1 for INBOX, 2 for SENT, and 3 for TRASH
 * @return string
 */
function mergeMessagesToHTMLText($messages,$controlType): string
{
    $appearText = '';
    foreach ($messages as $msg)
    {
        $bold = "";

        if($controlType === 1 &&$msg->is_read_receiver === "0")
        {
            $bold = "font-weight-bold";
        }
        $appearText .= '<li class="py-2 bd-highlight list-group-item">
                                <div class="d-flex flex-row bd-highlight align-items-center">
                                    <div class="p-2 bd-highlight">
                                        <input type="checkbox" name="message" id="'.$msg->id.'">
                                    </div>
                                    <!--                                                <div class="p-2 flex-grow-1 bd-highlight position-relative">-->
                                    <div class="d-flex flex-column flex-md-row bd-highlight align-items-center flex-grow-1 position-relative">';
        $appearText.='<div class="p-md-2 bd-highlight '.$bold.'">';
        if ($controlType !== 2){
            $appearText.= $msg->senderName;
        }
        else{
            $appearText .= $msg->receiverName;
        }
        $appearText.= '</div><div class="p-md-2 flex-grow-1 bd-highlight text-truncate '.$bold.'">';
        $appearText.= $msg->message_subject;
        $appearText.= '<a href="message_content.php?id='.$msg->id.'" class="p-0 stretched-link bd-highlight"></a>';
        $appearText.= '<div class="p-md-2 bd-highlight text-right">'.$msg->message_date.'</div></div></div></li>';

    }
    return $appearText;
}
