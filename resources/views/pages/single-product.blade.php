<x-root-html>
    <x-layout>
        <x-register />
        <div class="sm:max-w-screen-xl mt-10 m-auto mb-40">
            <div class="grid grid-cols-1 grid-rows-2 sm:grid-cols-2 sm:grid-rows-1">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img class="w-full max-w-sm h-auto" src="{{$product->product_image ? asset('storage/' . $product->product_image) : asset('images/Product-inside.png')}}" alt="">
                            <div>
                                d
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-between content-start {{-- bg-red-200 --}} h-full">
                        <div>
                            <h1 class="font-medium text-4xl	">{{$product->product_name}}</h1>
                            <p class="text-3xl font-light text-red-500 my-2"><span>&#8369;</span>{{$product->price}}</p>
                            <div class="mt-6">
                                <p class="my-2">Description:</p>
                                <p class="text-base">{{$product->product_description}}</p>
                            </div>
                        </div>

                        <div class="">
                            <form action="/cart" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                                <input type="hidden" name="product_name" value="{{$product->product_name}}">
                                <input type="hidden" name="product_price" value="{{$product->price}}" >
                                <input type="hidden" name="product_quantity" value="51">
                                <div>
                                    <p>Quantity:</p>
                                    <div class="flex mb-3">
                                        <button type="button" class="px-5 py-1 bg-red-100">+</button>
                                        <input type="number" class="text-center w-14 bg-red-200">
                                        <button type="button" class="px-5 py-1 bg-red-100">-</button>
                                    </div>
                                </div>

                                <div class="flex">
                                    <button type="submit" class="w-full duration-300 hover:bg-red-500 hover:text-white text-red-500 text-lg py-2 px-4 border-red-500 border-2">
                                        Add to Cart
                                    </button>
                                </div>

                                
                            </form>

                        </div>
                    </div>

            </div>
        </div>
    </x-layout>
</x-root-html>