<div x-data="{ open: '{{$isToggled}}' }" class="relative">
    <!-- Dropdown button -->
    <div class="font-light sm:mx-2 flex">
        <button x-on:click="open = {{!$isToggled}}" id="userBtnId" id="loginBtnId" class="text-xs px-4 py-2 rounded-xl mx-1 border-2 border-red-500">Log in</button>   
    </div>
    <!-- Dropdown menu -->
    <div x-show="open" x-cloak x-on:click.away="open = false" class="absolute right-0 mt-2 w-80 bg-sky-950 text-white rounded-md overflow-hidden shadow-lg">
        <form class="bg-white shadow-lg rounded px-8 pt-6 pb-8" method="POST" action="/login/auth">
            @csrf
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email
            </label>
            <input name="email" value="{{old('email')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
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