@isset($stock)
    <div class="flex mb-3">
        <button type="button" id="btnIncrementId" class="px-5 py-1 bg-red-100">+</button>
        <input type="number" data-product-stock="{{$stock}}" id="stockValueId" name="product_quantity" class="outline-0 text-center w-14 bg-red-200" value=1>
        <button type="button" id="btnDecrementId" class="px-5 py-1 bg-red-100">-</button>
    </div>
@endisset
@isset($currentstock)
        <div class="flex dynamicElement">
            {{-- the buttons must affect the product_stock from product table and the quantity of the current product from the cart table --}}
            <button value="increment" class="cartIncrementClass block px-2 py-1 rounded-l-lg text-base bg-red-200 sm:text-xl">+</button>
            <input type="hidden" class="productIdActual" value={{$cartItem->product_id}}>
            <input type="hidden" class="valueIdCart" value={{$cartItem->id}}>
            <input type="number" class="quantityValueElementClass outline-0 text-center bg-red-300 w-9 sm:w-14 sm:text-xl" value={{$quantity}}>
            <button value="decrement" class="cartDecrementClass px-2 py-1 rounded-r-lg text-base bg-red-200 sm:text-xl">-</button>
            
        </div>

@endisset

