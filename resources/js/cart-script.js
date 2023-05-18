
//********************************************************************************
//Single-product

let cartQuantIncrement = document.querySelectorAll(".cartQuantIncrementClass");
let cartQuantDecrement = document.querySelectorAll(".cartQuantDecrementClass")
let stockCartValue = document.querySelectorAll(".cartValueClass");


let totalStock = document.querySelectorAll('.cartValueClass');
/* let totalStock = totalStock.dataset. */
for (let index = 0; index < totalStock.length; index++) {
    console.log(totalStock[index].dataset.currentstock);
}
console.log("fdsjhfkdsjfksdfj");
/* console.log(stockCartValue[1]);
console.log(cartQuantIncrement[1]);
console.log(cartQuantDecrement[1]); */
console.log(cartQuantIncrement.length);

for(let x = 0; x < cartQuantIncrement.length; x++){
    cartQuantIncrement[x].addEventListener('click', function(){
        console.log("increment");
        console.log(stockCartValue[x].value);
        console.log(parseInt(totalStock[x].dataset.currentstock));
        if(parseInt(stockCartValue[x].value) < parseInt(totalStock[x].dataset.currentstock)){
            stockCartValue[x].value = parseInt(stockCartValue[x].value) + 1;
            console.log(stockCartValue[x].value);
        }
    });
    
    cartQuantDecrement[x].addEventListener('click', function(){
        console.log("decrement");
        if(parseInt(stockCartValue[x].value) === 1) {
            return;
        }
        stockCartValue[x].value = parseInt(stockCartValue[x].value) - 1;
    });
    
}




