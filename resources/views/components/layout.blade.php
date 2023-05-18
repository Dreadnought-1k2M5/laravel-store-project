
<header class="h-16 sm:h-auto bg-sky-950 sticky top-0">
    <div class="h-full">
        <div class="flex h-full flex-row max-w-screen-xl items-center content-start m-auto w-full sm:w-11/12">
            <div class="basis-1/6 sm:basis-1/12 flex items-center">
                <img src="{{asset('images/logo.png')}}" alt="" class="w-16 md:w-16">
            </div>
            <form class="basis-8/12	sm:grow" action="{{-- api/v1/search --}}/search">
                @csrf
                <div class="">
                    <input type="text" name="search" id="" class="rounded-lg grow p-2 w-full h-8 text-sm focus:outline-none focus:border-red-500 sm:py-3" placeholder="Search for products or category">
                    {{-- <button>Submit</button> --}}
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
{{--                         <div x-data="{open: false}" class="block mx-1 sm:hidden rounded-full bg-red-300">
                        </div> --}}
                        <div class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center sm:hidden">
                            <button class="text-2xl">&#9776;</button>
                        </div>
                    </nav>
                @endauth
                @guest
                    <nav class="w-full flex items-center justify-end">
                        <div>
                            <button id="signupBtnId" class="hidden text-xs px-4 py-2 rounded-xl mx-1 bg-red-500 lg:block">Sign up</button>
                        </div>
                        @php
                            $toggle = false;
                        @endphp
                        {{-- This directive is for toggling the login div when there's error in validating form input --}}
                        @if($errors->hasBag('auth') || $errors->any())
                        <div x-data="{ open: true }" class="relative">
                            <!-- Dropdown button -->
                            <div class="font-light mx-2 sm:mx-5 flex">
                                <button x-on:click="open = !open" id="userBtnId" id="loginBtnId" class="text-xs px-4 py-2 rounded-xl mx-1 border-2 border-red-500">Log in</button>   
                            </div>
                            <!-- Dropdown menu -->
                            <div x-show="open" x-cloak x-on:click.away="open = false" class="absolute right-0 mt-2 w-80 bg-sky-950 text-white rounded-md overflow-hidden shadow-lg">
                                <form class="bg-white shadow-lg rounded px-8 pt-6 pb-8" method="POST" action="/login/auth">
                                    @csrf
                                    <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                        Email
                                    </label>
                                    <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                                    </div>
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                    @error('email', 'auth')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
        
                                    <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                        Password
                                    </label>
                                    <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password">
                                    @error('password', 'auth')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Sign In
                                    </button>
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                                        Forgot Password?
                                    </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                            <div x-data="{ open: false }" class="relative">
                                <!-- Dropdown button -->
                                <div class="font-light mx-2 sm:mx-5 flex">
                                    <button x-on:click="open = !open" id="userBtnId" id="loginBtnId" class="text-xs px-4 py-2 rounded-xl mx-1 border-2 border-red-500">Log in</button>   
                                </div>
                                <!-- Dropdown menu -->
                                <div x-show="open" x-cloak x-on:click.away="open = false" class="absolute right-0 mt-2 w-80 bg-sky-950 text-white rounded-md overflow-hidden shadow-lg">
                                    <form class="bg-white shadow-lg rounded px-8 pt-6 pb-8" method="POST" action="/login/auth">
                                        @csrf
                                        <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                            Email
                                        </label>
                                        <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                                        </div>
                                        @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                        @error('email', 'auth')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
            
                                        <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                            Password
                                        </label>
                                        <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password">
                                        @error('password', 'auth')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="flex items-center justify-between">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Sign In
                                        </button>
                                        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                                            Forgot Password?
                                        </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                        
                    </nav>                    
                @endguest
                
            </div>
        </div>
    </div>
    <div class="hidden sm:block bg-sky-900 text-white font-light text-xs h-10 md:text-base lg:text-lg ">
        <div class="sm:block flex flex-row w-11/12 max-w-screen-xl m-auto h-full m-auto items-center content-start">
            <div class="hidden h-full sm:block">
                <a href="/" class="mr-10">Home</a>
                @foreach ($categories as $item)
                    <button class="h-full px-5 text-center hover:bg-sky-950 hover:text-red-500 duration-300 text-white">{{$item->category}}</button>
                @endforeach
            </div>
        </div>
    </div> 

</header>

<main>
    {{$slot}}
</main>

<footer class="bg-sky-950 sm:h-80">    
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