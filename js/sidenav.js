    //functions to animate sidebar menu
    var menuBtn = document.querySelector("#navBtn");
    var mobileView = window.matchMedia("(max-width: 700px)");
    menuBtn.onclick = function openNav() {
        document.getElementById("sideNav").style.width = "350px";
        if (mobileView.matches){
            document.getElementById("sideNav").style.width = "100%";
        }
    }
    
    var closeMenu = document.querySelector("#closeBtn");
    closeMenu.onclick = function closeNav() {
        document.getElementById("sideNav").style.width = "0";
    }