
//********************************************************************************
//Single-product

let btnIncrement = document.querySelector("#btnIncrementId");
let btnDecrement = document.querySelector("#btnDecrementId")
let stockValue = document.querySelector("#stockValueId");

let totalStock = document.querySelector('#stockValueId').dataset.productStock;

console.log(btnIncrement);

btnIncrement.addEventListener('click', function(){
    if(parseInt(stockValue.value) < parseInt(totalStock)){
        stockValue.value = parseInt(stockValue.value) + 1;
    }
});

btnDecrement.addEventListener('click', function(){
    if(parseInt(stockValue.value) === 1) {
        return;
    }
    stockValue.value = parseInt(stockValue.value) - 1;
});



