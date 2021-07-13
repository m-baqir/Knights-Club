function showMessages() {
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        console.log('this.readyState ='+this.readyState);
        console.log('this.status ='+this.status);
        if (this.readyState === 4 && this.status === 200){
            document.getElementById("list_messages").innerHTML = this.responseText;
        }
    };
    xmlHttp.open("GET", "get-messages.php");
    xmlHttp.send();
}

function handleAppearance(element, isVisible){
    if(isVisible === false){
        element.classList.toggle("visible", isVisible);
        element.classList.toggle("invisible", !isVisible);
        element.style.display = "none";
    }
    else {
        element.classList.toggle("visible", isVisible);
        element.classList.toggle("invisible", !isVisible);
        element.style.display = "block";
    }
}

window.onload = function (){
    let btn = document.getElementById("btn-back-to-mobile-inbox-control-bar");
    let messages = document.getElementById("list_messages_tools");
    let inbox_control_bar= document.getElementById("inbox_control_bar");
    //loading the latest messages every 10 seconds.
    setInterval(showMessages,10000);
    btn.onclick = function(){
        /*messages.classList.toggle("visible",false);
        messages.classList.toggle("invisible",true);
        messages.style.display = "none";

        inbox_control_bar.classList.toggle("invisible", false);
        inbox_control_bar.classList.toggle("visible",true);
        inbox_control_bar.style.display = "block";*/
        handleAppearance(messages,false);
        handleAppearance(inbox_control_bar, true);
    }

    let inbox = document.getElementById("inbox");

        inbox.onclick = function(){
            if(window.screen.width * window.devicePixelRatio < 576){
                handleAppearance(messages,true);
                handleAppearance(inbox_control_bar,false);
            }
            else{
                handleAppearance(messages,true);
                handleAppearance(inbox_control_bar,true);
            }
            showMessages();
        }




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