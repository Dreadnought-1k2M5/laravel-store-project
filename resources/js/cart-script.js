
//********************************************************************************
//Single-product

let csrfTokenMeta = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

let totalStock = document.querySelectorAll('.cartValueClass');


/* console.log(cartQuantIncrement);
console.log(cartQuantDecrement);
console.log(quantityElement);
console.log(itemTotalPrice); */


let dynamicElements = document.querySelectorAll('.dynamicElement');
console.log(dynamicElements);
dynamicElements.forEach(function(element){
    let cartQuantIncrement = document.querySelector(".cartIncrementClass");
    let cartQuantDecrement = document.querySelector(".cartDecrementClass");
    let quantityElement = document.querySelector(".quantityValueElementClass");
    let itemTotalPrice = document.querySelector(".itemTotalPriceClass");
    let productId = document.querySelectorAll('.productIdActual');
    let valueIdCart = document.querySelectorAll('.valueIdCart');
    let url = '/cart/update/quantity/' + valueIdCart;

    cartQuantIncrement.addEventListener('click', function(){
        ajaxFunction("increment", url, x, quantityElement, itemTotalPrice, productId, valueIdCart);
    });
    cartQuantDecrement.addEventListener('click', function(){
        ajaxFunction("decrement", url, x, quantityElement, itemTotalPrice, productId, valueIdCart);
    });
})
 
/* 
for(let x = 1; x < cartQuantIncrement.length; x += 2){
    console.log(x);
    cartQuantIncrement[x].addEventListener('click', function(){
        ajaxFunction("increment", url, x);
    });

    
}
for(let x = 1; x < cartQuantDecrement.length; x += 2){
    console.log(x);
    cartQuantDecrement[x].addEventListener('click', function(){
        ajaxFunction("decrement", url, x);
    });
} */

function ajaxFunction(operation, url, indexCartItem, quantityElement, itemTotalPrice,  productId, valueIdCart){
    $.ajax({
        url: url,
        type: 'PATCH',
        header: {
            'X-CSRF-TOKEN': csrfTokenMeta
        },
        data: {
            '_token': csrfTokenMeta,
            'operation': operation,
            'productId': productId
        },
        success: function(response) {
            // Handle success, update UI, display message, etc.
            console.log(indexCartItem);
            console.log(quantityElement);
            quantityElement[indexCartItem].value = response.newQuantity;
        },
        error: function(xhr) {
            // Handle error, display error message, etc.
            console.log(xhr.responseText);
        }
    });
}