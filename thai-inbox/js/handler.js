let controlType ={
    INBOX: 1,
    SENT: 2,
    TRASH: 3,
}
var inboxLoadingIntervalId;

function showMessages(control = 1) {
    let xmlHttp = new XMLHttpRequest();
    let url = "get-messages.php";
    xmlHttp.onreadystatechange = function () {
        //console.log('this.readyState =' + this.readyState);
        //console.log('this.status =' + this.status);
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("list_messages").innerHTML = this.responseText;
        }
    };

    if (control === controlType.SENT){
        clearInterval(inboxLoadingIntervalId);
        url= url.concat("?controlType=2");
    }
    else if (control === controlType.TRASH)
    {
        clearInterval(inboxLoadingIntervalId);
        url= url.concat("?controlType=3");
    }
    else {
        inboxLoadingIntervalId = setInterval(showMessages,10000);
    }
    xmlHttp.open("GET", url);
    xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlHttp.send();
}

function handleAppearance(element, isVisible) {
    if (isVisible === false) {
        element.classList.toggle("visible", isVisible);
        element.classList.toggle("invisible", !isVisible);
        element.style.display = "none";
    } else {
        element.classList.toggle("visible", isVisible);
        element.classList.toggle("invisible", !isVisible);
        element.style.display = "block";
    }
}

function getIdsOfSelectedMessages(name) {
    //Reference:https://www.javascripttutorial.net/javascript-dom/javascript-checkbox/
    let selectedMessages = document.querySelectorAll(`input[name="${name}"]:checked`);
    let messageIds = [];
    selectedMessages.forEach((selectedMessage) => {
        messageIds.push(selectedMessage.id);
    })

    return messageIds;
}

function moveSelectedMessagesToTrash(controlType) {

    let messageIds = getIdsOfSelectedMessages("message");
    let xmlHttpRequest = new XMLHttpRequest();
    xmlHttpRequest.onreadystatechange = function (){
        if(this.readyState === 4  && this.status === 200){
            console.log("successfully move to the trash" + this.responseText);
        }
    }

    xmlHttpRequest.open("post","move-messages-to-trash.php");
    xmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    let data = {"ids":messageIds, "controlType":controlType};
    console.log("data: "+data);
    //Reference: https://stackoverflow.com/questions/18866571/receive-json-post-with-php
    xmlHttpRequest.send(JSON.stringify(data));
    //xmlHttpRequest.send(messageIds);

}

function initOnClickEvent(element, control = 1) {
    element.onclick = function () {

        showMessages(control);
    }
}

window.onload = function () {
    let btn = document.getElementById("btn-back-to-mobile-inbox-control-bar");
    let messages = document.getElementById("list_messages_tools");
    let inbox_control_bar = document.getElementById("inbox_control_bar");
    let sent = document.getElementById("sent");
    let trash = document.getElementById("trash");

    //loading the latest messages every 10 seconds.
    inboxLoadingIntervalId= setInterval(showMessages, 10000);
    btn.onclick = function () {
        /*messages.classList.toggle("visible",false);
        messages.classList.toggle("invisible",true);
        messages.style.display = "none";

        inbox_control_bar.classList.toggle("invisible", false);
        inbox_control_bar.classList.toggle("visible",true);
        inbox_control_bar.style.display = "block";*/
        handleAppearance(messages, false);
        handleAppearance(inbox_control_bar, true);
    }

    let inbox = document.getElementById("inbox");

    /*inbox.onclick = function () {
        if (window.screen.width * window.devicePixelRatio < 576) {
            handleAppearance(messages, true);
            handleAppearance(inbox_control_bar, false);
        } else {
            handleAppearance(messages, true);
            handleAppearance(inbox_control_bar, true);
        }
        showMessages();
    }*/
    initOnClickEvent(inbox, controlType.INBOX)
    initOnClickEvent(sent, controlType.SENT);
    initOnClickEvent(trash, controlType.TRASH);

    function getResolution() {
        alert("Your screen resolution is: " + window.screen.width * window.devicePixelRatio + "x" + window.screen.height * window.devicePixelRatio);
    }

    // $('#btn-back-to-mobile-inbox-control-bar').click(function(){
    //     // $('#list_messages').animate({display:'none'},'slow');
    //     // $('inbox_control_bar').animate({display:'block'}, 'slow');
    //     $('#list_messages').hide();
    //     $('inbox_control_bar').show();
    // });


}