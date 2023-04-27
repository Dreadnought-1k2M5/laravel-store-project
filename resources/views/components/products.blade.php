<div class="lg:max-w-screen-xl mt-20 m-auto">
    <p class="sm:ml-3 text-2xl">Category 1</p>
    <div class="flex flex-col items-center sm:flex-row flex-col flex-wrap justify-around">
        @foreach ($products as $item)
        <div class="shadow-md h-4/5 w-5/6 sm:h-96 sm:w-64 m-2">
            <img src="{{asset('images/Product-inside.png')}}" alt="">
            <div class="p-3">
                <h1 class="font-medium text-xl">{{$item->product_name}}</h1>
                <p>price: {{$item->price}}</p>
                <p class="text-xs">{{$item->product_description}}</p>
            </div>

        </div>

    @endforeach
    </div>
</div>