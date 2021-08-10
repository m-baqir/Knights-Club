    //functions to animate sidebar menu
    var menuBtn = document.querySelector("#navBtn");
    var mobileView = window.matchMedia("(max-width: 700px)");
/*
    menuBtn.onclick = function openNav() {
        document.getElementById("sideNav").style.width = "350px";
        if (mobileView.matches){
            document.getElementById("sideNav").style.width = "100%";
        }
    }
*/
    var closeMenu = document.querySelector("#closeBtn");
/*
    closeMenu.onclick = function closeNav() {
        document.getElementById("sideNav").style.width = "0";
    }
*/
    window.addEventListener('click', function(e){
        if(menuBtn.contains(e.target) || document.getElementById("sideNav").contains(e.target)){
            document.getElementById("sideNav").style.width = "350px";
            if (mobileView.matches){
                document.getElementById("sideNav").style.width = "100%";
            }
            if (closeMenu.contains(e.target)) {
                document.getElementById("sideNav").style.width = "0";
            }
        }  else {
            document.getElementById("sideNav").style.width = "0";
        }
    })