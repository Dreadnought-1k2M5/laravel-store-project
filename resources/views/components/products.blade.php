<div class="lg:max-w-screen-xl mt-20 m-auto mb-32">

    @if ($products->count() < 1)
        <h1>No Result:</h1>
    @endif

    <div class="flex flex-wrap">
        @foreach ($products as $item)
            <div class="flex text-sky-900 my-1 w-1/2 h-auto mr-auto lg:w-72 shadow-md mb-10">
                <div class="p-3 w-full flex flex-col justify-between h-full">
                    <div>
                        <img class="w-44 h-auto m-auto" src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
                        <a href="" class="font-light hover:text-red-500 duration-100">{{$item->category}}</a>
                        <h1 class="font-medium text-lg">{{$item->product_name}}</h1>
                        <p class="my-2 text-red-500"><span>&dollar;</span>{{$item->price}}</p>
                        {{-- <p class="hidden sm:text-sm sm:line-clamp-3">{{$item->product_description}}</p> --}}
                    </div>
                    <br>
                    <div class="">
                        <a href="/product/{{$item->id}}" class="text-red-500 text-lg block text-center py-1 px-2 border-red-500 border-2 duration-300 hover:bg-red-500 hover:text-white">
                            Add to Cart
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <div class="w-full">
        {{ $products->links() }}
    </div>
</div>