<x-root-html>
    <x-layout>
        <x-register />
        <div class="sm:max-w-screen-xl mt-10 m-auto my-10 text-sky-900">
            <div class="grid grid-cols-1 grid-rows-2 sm:grid-cols-2 sm:grid-rows-1">
                    <div class="flex flex-col items-center">
                        <div>
                            <img class="w-full max-w-sm h-auto" src="{{$product->product_image ? asset('storage/' . $product->product_image) : asset('images/Product-inside.png')}}" alt="">
{{--                             <div>
                                
                            </div> --}}
                        </div>
                    </div>
                    <div class="flex flex-col justify-between content-start bg-gray-100 px-4 py-6 rounded">
                        <div>
                            <h1 class="font-medium text-4xl">
                                {{$product->product_name}}
                            </h1>
                            @if ($product->product_stock == 0)
                            <p class="text-red-500 font-light"> (Out of stock) </p>
                            @endif
                            <p class="text-3xl font-light text-red-500 my-2"><span>&#8369;</span>{{$product->price}}</p>
                            <div class="mt-6">
                                <p class="text-base">Description:</p>
                                <p class="text-base font-light ">{{$product->product_description}}</p>
                            </div>
                        </div>
                        <div class="mt-14">
                            <form action="/user/store-cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                
                                <input type="hidden" name="product_name" value="{{$product->product_name}}">
                                <input type="hidden" name="product_price" value="{{$product->price}}" >
                                <div class="flex">
                                    <div class="mr-10">
                                        <p>Quantity:</p>
{{--                                         <div class="flex mb-3">
                                            <button type="button" id="btnIncrementId" class="px-5 py-1 bg-red-100">+</button>
                                            <input type="number" data-product-stock="{{$product->product_stock}}" id="stockValueId" name="product_quantity" class="outline-0 text-center w-14 bg-red-200" value=1>
                                            <button type="button" id="btnDecrementId" class="px-5 py-1 bg-red-100">-</button>
                                        </div> --}}
                                        <x-quantity-component :stock="$product->product_stock"/>
                                    </div>
                                    <div>
                                        <p>Available Stock:</p>
                                        <p>{{$product->product_stock}}</p>
                                    </div>

                                </div>

                                <div class="flex">
                                    @if ($product->product_stock == 0)
                                        <button disabled  class="w-full bg-red-500 text-white text-lg py-2 px-4">
                                            OUT OF STOCK
                                        </button>       
                                    @else
                                        <button type="submit" class="disabled w-full duration-300 hover:bg-red-500 hover:text-white text-red-500 text-lg py-2 px-4 border-red-500 border-2">
                                            Add to Cart
                                        </button>
                                    @endif
                                </div>

                                
                            </form>

                        </div>
                    </div>

            </div>
        </div>
    </x-layout>
</x-root-html>