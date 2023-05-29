<div class="lg:max-w-screen-xl mt-20 m-auto mb-32">

    @if ($products->count() < 1)
        <h1>No Result:</h1>
    @endif

    @isset($categoryLabel)
    <div class="mb-10">
        <h1 class="text-xl">Category: <span class="">{{$categoryLabel}}</span></h1>

    </div>

    @endisset


    <div class="flex flex-wrap">
        @foreach ($products as $item)
            <div class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 p-4">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-44 h-auto m-auto" src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
    
                <div class="p-4">
                    <a href="" class="font-light text-sm sm:text-sm hover:text-red-500 duration-100">{{$item->category}}</a>
                    <h1 class="font-medium text-sm sm:text-base">{{$item->product_name}}</h1>
                    <p class="my-2 text-red-500"><span>&dollar;</span>{{$item->price}}</p>
                    <div class="mt-10">
                        <a href="/product/{{$item->id}}" class="bg-blue-500 bg-sky-900 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                        Add to Cart
                        </a>
                    </div>
    
                </div>
                </div>
            </div>     
        @endforeach
    </div>

      
    <div class="w-full">
        {{ $products->links() }}
    </div>
</div>