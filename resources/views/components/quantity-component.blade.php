@isset($stock)
    <div class="flex mb-3">
        <button type="button" id="btnIncrementId" class="px-5 py-1 bg-red-100">+</button>
        <input type="number" data-product-stock="{{$stock}}" id="stockValueId" name="product_quantity" class="outline-0 text-center w-14 bg-red-200" value=1>
        <button type="button" id="btnDecrementId" class="px-5 py-1 bg-red-100">-</button>
    </div>
@endisset

@isset($currentstock)
    <div class="flex">
        <button type="button" class="cartQuantIncrementClass px-2 py-1 text-base sm:text-xl">+</button>
        <input type="number" data-currentstock="{{$currentstock}}" name="product_quantity" class="cartValueClass rounded-lg outline-0 text-center bg-red-200 w-9 sm:w-14 sm:text-xl" value={{$quantity}}>
        <button type="button" class="cartQuantDecrementClass px-2 py-1 text-base sm:text-xl">-</button>
    </div>
@endisset

