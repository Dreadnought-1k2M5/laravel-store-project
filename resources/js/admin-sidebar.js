/* check if screen width is greater than 640px (size of sm tailwind class) */
window.addEventListener('resize', (e)=>{
    e.preventDefault();
    const windowWidth = window.innerWidth;
    if(windowWidth > 640){
        closeSidebar();
    }
    
});

/* tabs */
let overviewBtnID = document.querySelector("#overviewBtnID");
let productsBtnId = document.querySelector("#productsBtnId");
let ordersBtnId = document.querySelector("#ordersBtnId");

let productFormId = document.querySelector("#productFormId");
let displayProductId = document.querySelector("#displayProductId");


/* overviewBtnID.addEventListener('click', showAdminTab(0));
productsBtnId.addEventListener('click', showAdminTab(1));
ordersBtnId.addEventListener('click', showAdminTab(2)); */

let index = 0;
let adminTabNodeList = document.querySelectorAll('.admin-tab');
let buttons = document.querySelectorAll('.admin-side-btn');
let addProductBtnId = document.querySelector('#addProductBtnId');

addProductBtnId.addEventListener('click', function(e){
    e.preventDefault();
    alert("ADD PRODUCT");
    //displayProductId.style.display = "none";
    displayProductId.classList.add('hidden');
    productFormId.classList.remove('hidden');
})

buttons.forEach((button, index) => {
    button.addEventListener('click', function() {

        // Remove 'active' class from all buttons
        buttons.forEach((btn, subIndex) => {
            btn.classList.remove('text-sky-950');
            btn.classList.remove('bg-gray-300');
        });

        // Add 'active' class to the clicked button
        this.classList.add('text-sky-950');
        this.classList.add('bg-gray-300');
        //adminTabNodeList[index].classList.add('block');
    
        adminTabNodeList.forEach((elem, indexHide) => {
            adminTabNodeList[indexHide].style.display = "none";
        });
        console.log("clicked");
        //hide
        displayProductId.classList.remove('hidden');
        productFormId.classList.add('hidden');

        adminTabNodeList[index].style.display = "block";
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