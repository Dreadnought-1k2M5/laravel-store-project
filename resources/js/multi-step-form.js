let index = 0;

function showTab(n){
    let tabs = document.querySelectorAll(".tab");
    let checkoutBtn = document.querySelector("#checkoutBtnId");

    console.log(tabs);

    tabs[n].style.display = "block";
    //hide nextBtn when it's on the last tab
    if(index + 1 >= tabs.length){
        btnNext.style.display = "none";
        checkoutBtn.style.display = "inline-block";
    }
    //hide backBtn when it's on the first tab
    if((index - 1) < 0){
        btnBack.style.display = "none";
        checkoutBtn.style.display = "none";

    }
}

function validate(){
    // Get the input values
    const nameInput = document.getElementById('name');
    const addressInput = document.getElementById('address');
    const cityInput = document.getElementById('city');
    const stateInput = document.getElementById('state');
    const countryInput = document.getElementById('country');
    const phoneInput = document.getElementById('phone');
    const shippingInput = document.getElementById('shippingOptionId');
    const zipInput = document.getElementById('zipCodeId');

    // Get the input values
    const nameError = document.getElementById('nameError');
    const addressError = document.getElementById('addressError');
    const cityError = document.getElementById('cityError');
    const stateError = document.getElementById('stateError');
    const countryError = document.getElementById('countryError');
    const phoneError = document.getElementById('phoneError');
    const shippingError = document.getElementById('shippingError');
    const zipError = document.getElementById('zipError');


    let isValid = true;
    if(nameInput.value.trim() == ''){
        nameError.textContent = 'Please enter a name';
        isValid = false;
    }else{
        nameError.textContent = '';
    }

    if(addressInput.value.trim() == ''){
        addressError.textContent = 'Please enter an address';
        isValid = false;
    }else{
        addressError.textContent = '';
    }

    if(cityInput.value.trim() == ''){
        cityError.textContent = 'Please enter a city';
        isValid = false;
    }else{
        cityError.textContent = '';

    }

    if(stateInput.value.trim() == ''){
        stateError.textContent = 'Please enter a state';
        isValid = false;
    }else{
        stateError.textContent = '';

    }

    if(countryInput.value.trim() == ''){
        countryError.textContent = 'Please enter a country';
        isValid = false;
    }else{
        countryError.textContent = '';

    }

    if(phoneInput.value.trim() == ''){
        phoneError.textContent = 'Please enter a phone number';
        isValid = false;
    }else{
        phoneError.textContent = '';
    }

    if(shippingInput.value.trim() == ''){
        shippingError.textContent = 'Please select a shipping method';
        isValid = false;
    }else{
        shippingError.textContent = '';
    }

    if(zipInput.value.trim() == ''){
        zipError.textContent = 'Please enter a ZIP code';
        isValid = false;
    }else{
        zipError.textContent = '';
    }

    return isValid;
}

// NEXT
function nextTab(){
    let tabs = document.querySelectorAll(".tab");
    console.log(index);
    if(validate()){
        if((index + 1 < tabs.length)){
            tabs[index].style.display = "none";
            btnBack.style.display = "inline-block";
            index += 1;
            showTab(index);
        }
        return;
    }
    alert("Enter valid inputs only! Please check the form again.");
    return;
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