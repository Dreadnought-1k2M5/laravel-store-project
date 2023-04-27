<div class="modal" id="registerModalId">
    <div class="modal__modal-actual rounded-lg w-3/4 m-auto bg-sky-950 grid grid-cols-5"> 
        <div class="col-span-3 text-white px-8 py-5">
            <h1 class="text-5xl uppercase">Shop with Confidence!</h1>
            <p>Join the millions of satisfied customers who trust [Ecommerce Website Name] for all their shopping needs. Sign up now and get access to exclusive deals, promotions, and rewards. Shop smarter, save more, and enjoy the convenience of shopping online with [Ecommerce Website Name].
            </p>
        </div>
        <div class=" rounded-lg col-span-2 bg-slate-100 flex flex-col">
            <span id="" class="modal__exit-btn text-3xl font-light">&times;</span>

            <form class="w-full max-w-full bg-slate-100 p-6 h-4/5" method="POST" action="">
                @csrf
                <div class="flex flex-wrap mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        First Name
                    </label>
                    <input class="h-8 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" placeholder="John">
                    
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Last Name
                    </label>
                    <input class="h-8 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                    </div>
                </div>
                <div class="flex flex-wrap mb-4">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Email
                    </label>
                    <input class="h-8 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="email">
                    </div>
                </div>
                <div class="flex flex-wrap mb-4">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Password
                        </label>
                        <input class="h-8 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                    </div>
                </div>
                <div class="flex flex-wrap mb-4">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Confirm Password
                        </label>
                        <input class="h-8 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                    </div>
                </div>
                </form>
                <div>
{{--                     Laravel Socialite
                    <ul>
                        <li>Google</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                    </ul> --}}
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                          <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                            Sign Up
                          </button>
                        </div>
                      </div>
                </div>
        </div>
    </div>
</div>
