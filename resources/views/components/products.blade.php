<div class="lg:max-w-screen-xl mt-20 m-auto mb-32">

    @if ($products->count() < 1)
        <h1>No Result:</h1>
    @endif

    <div class="flex sm:flex-row flex-wrap justify-normal md:justify-evenly lg:justify-normal">
        @foreach ($products as $item)
            <div class="flex text-sky-900 my-1 w-1/2 h-1/1 mr-auto md:w-64 md:mr-4 lg:w-72 shadow-md mb-10">
                <div class="p-3 w-full flex flex-col justify-between h-full">
                    <div>
                        <img class="w-44 h-auto m-auto" src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
                        <div class="mt-2">
                            <a href="" class="font-light text-sm sm:text-base hover:text-red-500 duration-100">{{$item->category}}</a>
                            <h1 class="font-medium text-sm sm:text-lg">{{$item->product_name}}</h1>
                            <p class="my-2 text-red-500"><span>&dollar;</span>{{$item->price}}</p>
                        </div>

                        {{-- <p class="hidden sm:text-sm sm:line-clamp-3">{{$item->product_description}}</p> --}}
                    </div>
                    <br>
                    <div class="">
                        <a href="/product/{{$item->id}}" class="text-white text-base sm:text-lg block text-center py-1 px-2 bg-sky-900 rounded duration-300 hover:bg-red-500">
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