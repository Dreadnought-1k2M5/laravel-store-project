<div class="lg:max-w-screen-xl mt-20 m-auto mb-48">

    @if ($products->count() < 1)
        <h1>No Result:</h1>
    @endif

    <div class="flex flex-col items-start sm:flex-row flex-wrap">
        @foreach ($products as $item)
            <div class="shadow-md mb-10 sm:h-auto sm:w-72 mx-2 my-2 flex flex-col justify-between">
                <a href="/product/{{$item->id}}" class="">
                    <div class="p-3">
                        <img src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
                        <a href="" class="font-light hover:text-red-500 duration-100">{{$item->category}}</a>
                        <h1 class="font-medium text-xl">{{$item->product_name}}</h1>
                        <p class="my-2 text-red-500"><span>&#8369;</span>{{$item->price}}</p>

                        <p class="text-sm line-clamp-3">{{$item->product_description}}</p>
                    </div>
                </a>
                
                <div class="">
                    <button class="w-full h-full duration-300 hover:bg-red-500 hover:text-white text-red-500 text-lg py-2 px-4 border-red-500 border-2">
                    Add to Cart
                  </button>
                </div>

            </div>

    @endforeach
    </div>
</div>