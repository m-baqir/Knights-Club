$(document).ready(()=>{
    let btn = document.getElementById("btn-back-to-mobile-inbox-control-bar");
    let messages = document.getElementById("list_messages_tools");
    let inbox_control_bar= document.getElementById("inbox_control_bar");
    btn.onclick = function(){
        // if (messages.style.display === "none"){
        //     messages.style.display = "block";
        // }
        // else{
        //     messages.style.display = "none";
        // }
        // if (inbox.style.display === "none"){
        //     inbox.style.display = "block";
        // }
        // else{
        //     inbox.style.display = "none";
        // }
        messages.classList.toggle("visible",false);
        messages.classList.toggle("invisible",true);     
        messages.style.display = "none";

        inbox_control_bar.classList.toggle("invisible", false);
        inbox_control_bar.classList.toggle("visible",true);
        inbox_control_bar.style.display = "block";
    }

    let inbox = document.getElementById("inbox");
    
        inbox.onclick = function(){
            if(window.screen.width * window.devicePixelRatio < 576){
                inbox_control_bar.classList.toggle("visible",false);
                inbox_control_bar.classList.toggle("invisible",true);
                inbox_control_bar.style.display = "none";
                
                messages.classList.toggle("invisible", false);
                messages.classList.toggle("visible",true);
                messages.style.display = "block";
            }
            else{
                messages.classList.toggle("visible",true);
                messages.classList.toggle("invisible",false);     
                messages.style.display = "block";
    
                inbox_control_bar.classList.toggle("invisible", false);
                inbox_control_bar.classList.toggle("visible",true);
                inbox_control_bar.style.display = "block";
            }
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
})