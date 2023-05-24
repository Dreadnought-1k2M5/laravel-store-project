<header class="h-16 sm:h-auto bg-sky-950 sticky top-0">
    <div class="h-full">
        <div class="flex h-full flex-row max-w-screen-xl items-center content-start mx-auto w-full sm:w-11/12">
            <div class="basis-1/6 sm:basis-1/12 flex items-center">
                <img src="{{asset('images/logo.png')}}" alt="" class="w-16 md:w-16">
            </div>
            <form class="basis-8/12	sm:grow" action="{{-- api/v1/search --}}/product">
                @csrf
                <div class="flex">
                    <input type="text" name="search" id="" class="bg-gray-900 text-red-100 text-xs rounded-l-lg grow p-2 w-full h-9 focus:outline-none focus:border-red-500 sm:py-3" placeholder="Search for products">
                    <select id="country" name="category" class="text-xs bg-sky-800 text-white h-9 w-16 sm:w-24 block rounded-r-md focus:outline-none">
                        <option class="text-sm" value="all">All products</option>
                        @foreach ($categories as $item)
                            @isset($category) {{-- for search-result page --}}
                                <option class="text-sm"  value="{{$item->category}}" {{ $category == $item->category ? 'selected' : '' }} > {{$item->category}}</option>
                            @else{{-- for index main page --}}
                                <option class="text-sm"  value="{{$item->category}}" > {{$item->category}}</option>
                            @endisset
                        @endforeach
                    </select>
                </div>
            </form>
            <div class="flex items-center justify-end basis-1/4 ml-3 sm:basis-1/5 text-white" {{-- x-data="{show: false, toggle(){this.show = !this.show} }" --}}>
                @auth
                    <nav class="w-full flex items-center justify-around sm:justify-end">
                        <a href="/cart" class="hidden sm:block flex justify-center items-center rounded-full bg-gray-900 flex flex-col justify-center items-center w-10 h-10 px-2 py-2">
                            <img src="{{asset('images/cart-icon.png')}}" alt="Image">
                        </a>
                        <div x-data="{ open: false }" x-cloak class="relative">
                            <!-- Dropdown button -->
                            <div class="font-light sm:mx-5 flex">
                                <button x-on:click="open = !open" id="userBtnId" class="font-semibold flex items-center" >
                                    <img src="{{asset('images/test.jpg')}}" class="w-10 h-10 rounded-full object-cover" alt="">
                                </button>
                            </div>
                            <!-- Dropdown menu -->
                            <div x-show="open" x-on:click.away="open = false" class="absolute right-0 mt-2 w-80 bg-sky-950 text-white rounded-md overflow-hidden shadow-lg">
                                <a href="/profile" class="block px-4 py-2 my-2 flex items-center hover:bg-gray-700">
                                    <img src="{{asset('images/test.jpg')}}" class="w-10 h-10 rounded-full object-cover mr-2" alt="">
                                    <p>{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</p>
                                </a>
                                <div class="w-11/12 border-b-2 m-auto">
                                </div>
                                <div class="my-1">
                                    {{-- <img src="{{asset('images/setting.png')}}" class="h-auto w-6 mr-4" alt=""> --}}
                                    <a href="#" class="block {{--  px-4 py-2 --}} px-4 py-2 hover:bg-gray-700">Settings</a>
                                </div>
                                
                                <form method="POST" action="/logout" class="my-1">
                                    @csrf
                                    {{-- <img src="{{asset('images/exit.png')}}" class="h-auto w-6 mr-4" alt=""> --}}
                                    <button type="submit" class="block h-full w-full hover:bg-gray-700 px-4 py-2 text-left">Logout</button>
                                </form>
                            </div>
                        </div>
                        @php
                            $target = 'btnSidebarId';
                        @endphp
                        <x-side-btn class="bg-gray-900" :idTarget="$target"/>

                    </nav>
                    <div id="mySidenav" style="top: 60px" class="sidenav flex flex-col right-0">
                        @foreach ($categories as $item)
                            <a class="sidenav__links">{{$item->category}}</a>
                        @endforeach
                    </div>

                @endauth
                @guest
                    <nav class="w-full flex items-center justify-end">
                        <div>
                            <button id="signupBtnId" class="hidden text-xs px-4 py-2 rounded-xl mx-1 bg-red-500 lg:block">Sign up</button>
                        </div>
                        {{-- This directive is for toggling the login div when there's error in validating form input --}}
                        @if($errors->hasBag('auth') || $errors->any())
                            <x-login-dropdown :isToggled="true" />
                        @else
                            <x-login-dropdown :isToggled="false"/>
                        @endif
                        
                    </nav>                    
                @endguest
                
            </div>
        </div>
    </div>

    @include('partials.__category')
    <div class="bg-dark" id="bgDarkId"></div>{{-- background when sidebar displays --}}

</header>


<main class="flex-grow">
    {{$slot}}
</main>
    
<footer class="mt-auto bg-sky-950 sm:h-80">    
    <div class="max-w-screen-xl sm:m-auto grid grid-cols-1 md:grid-cols-4 gap-5 text-white pt-10 h-full font-semibold">
        <div class="leading-8 font-light">
            We are an online store that offers a wide variety of products, ranging from electronics to fashion, beauty, home decor, and more. Our website is designed to provide a seamless shopping experience for our customers, with easy navigation, secure payment options, and fast shipping.
        </div>
        <div class="ml-12">
            <ul class="leading-8">
                <li><a href="">Shipping &amp; Delivery</a></li>
                <li><a href="">Returns &amp; Refunds</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms &amp; Conditions</a></li>
                <li><a href="">Payment Method</a></li>
            </ul>
        </div>
        <div class="leading-8">
            <ul>
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">FAQs</a></li>
            </ul>
        </div>
        <div>
            <p class="font-light">Follow Us</p>
            <div>
                <ul class="flex">
                    <li><a href="https://www.facebook.com/"><img src="{{asset('images/social/fb.png')}}" class="h-10 w-10"/></a></li>
                    <li><a href="https://www.instagram.com/"><img src="{{asset('images/social/instagram.png')}}" class="h-10 w-10"/></a></li>
                    <li><a href="https://www.twitter.com/"><img src="{{asset('images/social/twitter.png')}}" class="h-10 w-10"/></a></li>
                    <li><a href="https://www.pinterest.com/"><img src="{{asset('images/social/pinterest.png')}}" class="h-10 w-10"/></a></li>
                    <li><a href="https://www.linkedin.com/"><img src="{{asset('images/social/linkedin.png')}}" class="h-10 w-10"/></a></li>
                    <li><a href="https://www.youtube.com/"><img src="{{asset('images/social/yt.png')}}" class="h-10 w-10"/></a></li>
                </ul>
                
            </div>
        </div>
    </div>
</footer>