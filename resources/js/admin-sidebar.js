/* check if screen width is greater than 640px (size of sm tailwind class) */
window.addEventListener('resize', (e)=>{
    e.preventDefault();
    const windowWidth = window.innerWidth;
    if(windowWidth > 640){
        closeSidebar();
    }
    
});

/* Sidebar buttons when clicked */
const buttons = document.querySelectorAll('.block');
buttons.forEach(button => {
    button.addEventListener('click', function() {
        // Remove 'active' class from all buttons
        buttons.forEach(btn => {
            btn.classList.remove('text-sky-950');
            btn.classList.remove('bg-gray-300');

        });

        // Add 'active' class to the clicked button
        this.classList.add('text-sky-950');
        this.classList.add('bg-gray-300');
    });
});


let btnBurger = document.querySelector('#adminSidebarId');
btnBurger.addEventListener('click', openSidebar);
function openSidebar(){
    document.body.style.overflow = "hidden";
    document.getElementById("mySidenav").style.width = "250px";
    
    document.querySelector(".bg-dark").style.display = "inline-block";
    document.querySelector(".bg-dark").style.position = "absolute";
    document.querySelector(".bg-dark").style.backgroundColor = "rgba(0, 0, 0, 0.644)";
    document.querySelector(".bg-dark").style.width = "100%";
    document.querySelector(".bg-dark").style.height = "1000vh";
    document.querySelector(".bg-dark").style.zIndex = "9";
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