
<div class="hidden sm:block bg-sky-900 text-white font-light text-xs h-10 md:text-base ">
    <div class="sm:block flex flex-row w-11/12 max-w-screen-xl m-auto h-full m-auto items-center content-start">
        <div class="hidden h-full sm:block">
            <a href="/" class="mr-10">Home</a>
            @foreach ($categories as $item)
                <button class="h-full px-5 text-center hover:bg-sky-950 hover:text-red-500 duration-300 text-white">{{$item->category}}</button>
            @endforeach
        </div>
    </div>
</div>