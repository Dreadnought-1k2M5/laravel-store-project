<div class="bg-sky-900 text-white md:h-12 hidden md:block sm:hidden h-10">
    <div class="flex flex-row max-w-screen-xl h-full m-auto items-center content-start font-light text-lg">
        <a href="/" class="mr-10">Home</a>
        @foreach ($categories as $item)
            <button class=" h-full px-5 text-center hover:bg-red-500 duration-300 text-white">{{$item->category}}</button>
        @endforeach

    </div>
</div>
