<x-root-html>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <body>
        <x-layout>
            <x-register />
            <div class="max-w-screen-xl mb-44 mt-10 text-sky-900 sm:py-8 sm:w-11/12 sm:mb-56 sm:mx-auto lg:mb-56">
                <div class="">
                    @if($Cart->count() > 0)
                    @php
                        $total = 0;
                    @endphp
                    <div class="w-full px-1 mx-auto">
                        @if(session()->has('message'))
                            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                            class="bg-red-500 py-7 px-4 mb-1">
                                <p class="text-white text-2xl">
                                    {{session('message')}}
                                </p>
                            </div>
                        @endif
                        <div class="mb-5">
                            <h1 class="text-xl">Shopping Cart</h1>
                        </div>

                        <table class="w-full">
                            <tr class="sm:table-row flex font-semibold">                          
                                <th>
                                
                                </th>
                                <th>
                                    
                                </th>
                                <th class="hidden sm:block text-left text-xl">
                                    <h1 class="text-center">Total</h1>
                                </th>
                                <th>
                                
                            </th>
                            </tr>
                        </thead>
                            <tbody class="">
                            @foreach ($Cart as $item)
                                {{-- {{dd($item)}} --}}
                                <tr class="sm:table-row flex font-semibold border-b-2 h-36">                          
                                    <td class="flex items-center w-4/5">
                                        <div class="w-1/2 sm:w-3/4 md:w-3/5 lg:w-2/5">
                                            <img class="w-32 h-auto" src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
                                        </div>
                                        <div class="w-1/2 {{-- bg-red-100  --}}sm:w-2/3 ml-3">
                                            <h1 class="text-xs sm:text-sm lg:text-lg">{{$item->product_name}}</h1>
                                            <h1 class="font-light text-sm">Price: <span class="font-semibold text-red-500">&dollar;{{$item->product_price}}</span></h1>    
                                            <div class="sm:hidden mt-2">{{-- MOBILE VIEW --}}
                                                <x-quantity-component :cartItem="$item" :currentstock="$item->product_stock" :quantity="$item->product_quantity"/>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-1/5">
                                        <div class="hidden sm:block flex flex-colr"> {{-- DESKTOP VIEW --}}
                                            <x-quantity-component :cartItem="$item" :currentstock="$item->product_stock" :quantity="$item->product_quantity"/>
                                        </div>
                                    </td>
                                    <td class="w-2/5 h-full{{--  bg-green-100 --}}">
                                        <div class="h-full flex justify-center items-center">
                                            <h1 class="font-semibold text-center text-2xl sm:text-4xl">&dollar;<span class="itemTotalPriceClass">{{$item->total_price}}</span></h1>  
                                        </div>
                                        @php
                                            $total += $item->total_price;
                                        @endphp 
                                    </td>
                                    <td class="h-full flex items-center">
                                        <form action="/cart/delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="target_item" value="{{$item->product_id}}">
                                            {{-- to make sure the product to be deleted from cart table belongs to the cureently authenticated user --}}
                                            <input type="hidden" name="user_id" value="{{$item->user_id}}">
                                            <button type="submit"><img src="{{asset('images/trash-bin.png')}}" class="h-auto w-12"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
    
                        <div class="mt-10 sm:ml-auto md:w-2/4 lg:w-1/4">
                            <div class="border-b-2 my-4">
                                <h1 class="text-xl font-semibold">Total Price: <span>&dollar;</span>{{$total}}</h1>
                            </div>
                            <div class="">
                                <form action="/checkout" method="POST">
                                    @csrf
                                    <button class="font-light block w-full px-2 py-3 bg-red-500 text-white text-sm">
                                        PROCEED TO CHECKOUT
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
    
                    @else
                        <div class="w-4/5 m-auto py-5 border-b-2">
                            <h1 class="text-xl md:text-2xl">No Products at cart</h1>
                        </div>
                    @endif
                </div>
            </div>
    
        </x-layout>
    </body>
</x-root-html>