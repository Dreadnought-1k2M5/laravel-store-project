<x-root-html>
    <body>
        <x-layout>
            <x-register />
            <div class="sm:max-w-screen-xl mt-10 mx-auto my-10 text-sky-900">
                <div class="grid grid-cols-1 sm:grid-cols-5 md:grid-cols-3 lg:grid-cols-3 md:grid-rows-1 ">
                        <div class="flex flex-col mx-1 sm:col-span-2 md:col-span-1 lg:col-span-1 items-center mb-3">
                            <div class="mb-3 sm:hidden">
                                <h1 class="font-medium text-2xl">
                                    {{$product->product_name}}
                                </h1>
                            </div>
                            <div>
                                <img class="w-4/5 mx-auto sm:w-full max-w-sm h-auto" src="{{$product->product_image ? asset('storage/' . $product->product_image) : asset('images/Product-inside.png')}}" alt="">
                            </div>
                        </div>
                        <div class="flex flex-col mx-1 sm:col-span-3 md:col-span-2 lg:col-span-2 justify-between content-start bg-slate-50 px-4 py-6 rounded">
                            <div>
                                <h1 class="hidden sm:block font-medium text-4xl">
                                    {{$product->product_name}}
                                </h1>
                                @if ($product->product_stock == 0)
                                <p class="text-red-500 font-light"> (Out of stock) </p>
                                @endif
                                <p class="text-3xl font-light text-red-500 my-2"><span>&dollar;</span>{{$product->price}}</p>
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
                                            <x-quantity-component :stock="$product->product_stock"/>
                                        </div>
                                        <div>
                                            <p>Available Stock:</p>
                                            <p>{{$product->product_stock}}</p>
                                        </div>
    
                                    </div>
    
                                    <div class="flex">
                                        @if ($product->product_stock == 0)
                                            <button disabled  class="w-full bg-red-500 text-white text-lg py-2 px-4 md:w-2/4">
                                                OUT OF STOCK
                                            </button>       
                                        @else
                                            <button type="submit" class="w-full duration-300 rounded bg-sky-900 hover:bg-red-500 text-white text-lg py-2 px-4 md:w-2/4">
                                                Add to Cart
                                            </button>
                                        @endif
                                    </div>
                                </form>
    
                            </div>
                        </div>
                </div>
    
                <div class="mt-10 mb-24 mx-2 h-auto sm:mx-auto sm:w-4/5">
                    <h2 class="text-lg font-semibold">Related Products</h2>
                    <div class="flex flex-col mt-4 mx-auto h-1/1 w-full h-full justify-between sm:wrap sm:flex-row">
                        @foreach($relatedProducts as $item)
                            <div class="p-2 bg-slate-100 w-full flex my-1 mx-1 sm:w-3/5">
                                <div class="mr-3">
                                    <img class="w-32 h-auto m-auto" src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
                                </div>
                                <div class="flex flex-col justify-between">
                                    <div>
                                        <h1 class="font-medium text-sm">{{$item->product_name}}</h1>
                                        <a href="" class="font-light text-xs hover:text-red-500 duration-100">{{$item->category}}</a>
                                        <p class="my-2 text-red-500"><span>&dollar;</span>{{$item->price}}</p>
                                    </div>
                                    <div class="w-full">
                                        <a href="/product/{{$item->id}}" class="text-white text-sm text-center py-1 px-2 bg-sky-900 rounded duration-300 hover:bg-red-500">
                                            Add to Cart
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </x-layout>
    </body>

</x-root-html>