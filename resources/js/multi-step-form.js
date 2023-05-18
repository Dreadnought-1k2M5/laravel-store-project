let index = 0;

function showTab(n){
    let tabs = document.querySelectorAll(".tab");
    console.log(tabs);

    tabs[n].style.display = "block";
    //hide nextBtn when it's on the last tab
    if(index + 1 >= tabs.length){
        btnNext.style.display = "none";
    }
    //hide backBtn when it's on the first tab
    if((index - 1) < 0){
        btnBack.style.display = "none";
    }
}

function validate(){
    let addressInput = document.querySelector("#shippingAddressId").value;
    let optionInput = document.querySelector("#shippingOptionId").value;
    let zipInput = document.querySelector("#zipCodeId").value;

    let addressError = document.querySelector("#addressError");
    let optionError = document.querySelector("#addressError");
    let zipError = document.querySelector("#addressError");

    let isValid = false;
    if(addressInput.trim() == ''){
        addressError.value = "Invalid value";
    }
    if(optionInput.trim() == ''){
        optionError.value = "Invalid Option";
    }
    if(zipInput.trim() == ''){
        zipError.value = "Invalid ZIP";
    }
    return isValid;
}

// NEXT
function nextTab(){
    let tabs = document.querySelectorAll(".tab");
    console.log(index);
/*     switch(index){
        case 0:
            if(validate()){
                break;
            }else
                return false;
        case 1:
            break;
        case 2:
            break;
            
    } */
    if((index + 1 < tabs.length)){
        tabs[index].style.display = "none";
        btnBack.style.display = "inline-block";
        index += 1;
        showTab(index);
    }

}
let btnNext = document.querySelector("#nextTabId");
btnNext.addEventListener('click', nextTab);

// BACK
function backTab(){
    let tabs = document.querySelectorAll(".tab");
    //show nextBtn if it's not on the last tab
    if(index - 1 < tabs.length){
        btnNext.style.display = "inline-block";
    }
    console.log(index);
    if((index - 1) >= 0){
        tabs[index].style.display = "none";
        index -= 1;
        showTab(index);
    }
}
let btnBack = document.querySelector("#backTabId");
btnBack.addEventListener('click', backTab);