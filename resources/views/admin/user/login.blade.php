<x-root-html>
    @vite('resources/css/admin/admin.login.css')
    <body>

        <div class="h-screen bg-sky-950 flex justify-center items-center">
            <div class="absolute top-0 w-screen">
                @if(session()->has('errorMessage'))
                    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="text-center bg-red-500 py-3 px-4 mb-1" >
                        <p class="text-white text-2xl">
                            {{session('errorMessage')}}
                        </p>
                    </div>
                @endif
            </div>

            <div class="parent-box h-80 w-11/12 sm:grow max-w-lg">
                
                <h2 class="text-2xl font-semibold mb-6">Admin Gate</h2>
                <form action="/gate/auth-admin" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-left text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input id="email" name="email" value="{{ old('email') }}" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Enter your email">
                        @error('email')
                            <div>
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-left text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input id="password" name="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Enter your password">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-sky-900 focus:outline-none">Login</button>
                        <a href="#" class="text-sm text-red-700 hover:text-sky-900">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

</x-root-html>
