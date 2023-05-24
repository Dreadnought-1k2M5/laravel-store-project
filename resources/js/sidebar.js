let btnBurger = document.querySelector('#btnSidebarId');
btnBurger.addEventListener('click', openSidebar);
function openSidebar(){
    document.body.style.overflow = "hidden";
    document.getElementById("mySidenav").style.width = "250px";
    
    /* document.body.style.backgroundColor = "rgba(0, 0, 0, 0.733)";           */
    document.querySelector(".bg-dark").style.display = "inline-block";
    document.querySelector(".bg-dark").style.position = "absolute";
    /* document.querySelector(".bg-dark").style.top = "0px";
    document.querySelector(".bg-dark").style.bottom = "0px"; */
    document.querySelector(".bg-dark").style.backgroundColor = "rgba(0, 0, 0, 0.644)";
    document.querySelector(".bg-dark").style.width = "100%";
    document.querySelector(".bg-dark").style.height = "1000vh";
    document.querySelector(".bg-dark").style.zIndex = "9";

    let linksSidebar = document.querySelectorAll('.sidenav__links');
    linksSidebar.forEach((elem)=>{
        elem.style.display = "block";
    });
}


function closeSidebar(){
    document.getElementById("mySidenav").style.width = "0";
    /* document.getElementById("main").style.marginLeft= "0"; */
    document.body.style.backgroundColor = "white";
    document.body.style.overflow = "auto";
    document.querySelector(".bg-dark").style.display = "none";
}

let bgDark = document.querySelector("#bgDarkId");

bgDark.addEventListener('click', closeSidebar);