<div class="hidden text-white h-10 sm:block">
    <div class="flex flex-row max-w-screen-xl h-full m-auto items-center content-start font-light text-xs md:text-base lg:text-lg">
        <a href="/" class="mr-10">Home</a>
        @foreach ($categories as $item)
            <button class=" h-full px-5 text-center hover:bg-sky-950 duration-300 text-white">{{$item->category}}</button>
        @endforeach

    </div>
</div>
