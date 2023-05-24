<x-root-html>
    <body>
        <div class="h-screen grid grid-cols-12">
            <div class="bg-sky-950 hidden sm:block sm:col-span-4 md:col-span-3 lg:col-span-2">
                {{-- <div class="bg-gray-900 text-white h-full w-64"> --}}
                    <x-links-dashboard />
                {{-- </div> --}}
            </div>
            <div class="bg-slate-300 col-span-12 sm:col-span-8 md:col-span-9 lg:col-span-10">
                @php
                    $target = 'adminSidebarId';
                @endphp
                <div class="bg-slate-300">
                    <x-side-btn class="bg-none" :idTarget="$target"/>
                </div>

                {{-- For mobile view --}}
                <div id="mySidenav" class="sidenav top-0 sm:hidden">
                    <x-links-dashboard />
                </div>
                <div class="bg-dark sm:hidden" id="bgDarkId"></div>{{-- background when sidebar displays --}}

            </div>
        </div>
    </body>
</x-root-html>