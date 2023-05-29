
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


function ajaxProductStock(){
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

