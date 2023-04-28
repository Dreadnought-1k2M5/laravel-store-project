
<header class="md:h-16 sm:h-10 h-10  bg-sky-950 sticky top-0">
    <div class="md:h-16 sm:h-10 h-10 bg-sky-950">
        <div class="flex flex-row max-w-screen-xl m-auto items-center content-start">
            <div class="basis-1/12">
                <img src="{{asset('images/logo.png')}}" alt="" class="w-16 md:w-16">
            </div>
            <div class="lg:h-10 grow">
                <form action="">
                    @csrf
                    <div class="flex flex-row items-center">
                        <input type="text" name="" id="" class="h-10 rounded-lg grow">
                        {{-- <button>Submit</button> --}}

                    </div>
                </form>  
            </div>
            <div class="basis-3/12 relative  text-white" x-data="{show: false, toggle(){this.show = !this.show} }">
                @auth
                    <nav class="flex sm:flex-row-reverse">
                        <div>
                            <form method="POST" action='/logout'>
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>


                        <div class="font-light mr-5">
                            Welcome <span class="font-semibold">{{auth()->user()->first_name}}</span>
                        </div>

                    </nav>
                @endauth
                @guest
                    <nav class="flex sm:flex-row-reverse">
                        <button id="signupBtnId" class="ml-5 px-5 text-red-400 ">Sign up</button>
                        <button id="loginBtnId" class="text-white ml-5 hover:text-red-400 rounded-lg h-14 w-12">Log in</button>   
                    </nav>
                    @php
                        $toggle = false;
                    @endphp
                    @if($errors->any())
                        @php
                            $toggle = true
                        @endphp
                    @endif
                    <div @style(['display: block' => $toggle, 'display:none' => !$toggle]) id="loginFormId" class="absolute bg-sky-800 md:w-80 md:h-64 top-17 right-20 rounded-md shadow-lg">
                        <form class="bg-white shadow-lg rounded px-8 pt-6 pb-8" method="POST" action="/login/auth">
                            @csrf
                            <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Username
                            </label>
                            <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password">
                            @error('password')
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
                @endguest
                
            </div>
        </div>
    </div>
    @include('partials.__category')


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