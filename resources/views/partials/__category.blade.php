
<div class="hidden sm:block bg-sky-900 text-white font-light text-xs h-10 md:text-base ">
    <div class="sm:block h-full flex flex-row w-11/12 max-w-screen-xl h-full mx-auto items-center content-start">
        <div class="hidden h-10 sm:block">
            <a href="/" class="inline-block align-middle px-5 sm:py-3 md:py-2 hover:bg-sky-950 hover:text-red-500 duration-300 text-white">Home</a>
            @foreach ($categories as $item)
                <a href="/product/category/{{$item->category}}" class="inline-block align-middle px-5 sm:py-3 md:py-2 hover:bg-sky-950 hover:text-red-500 duration-300 text-white">{{$item->category}}</a>
            @endforeach
        </div>
    </div>
</div>