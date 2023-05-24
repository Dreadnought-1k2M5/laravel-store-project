<x-root-html>
    <body>
        <x-layout>
            <x-register />
            <div class="w-full max-w-screen-xl mb-32 mt-10 text-sky-900 sm:py-8 sm:w-11/12 sm:mb-56 sm:mx-auto lg:mb-56">
                <div class="col-start-1 col-end-4 row-span-1">
                    @if($Cart->count() > 0)
                    @php
                        $total = 0;
                    @endphp
                    <div class="w-full px-1 lg:w-4/5 mx-auto">
                        <div>
                            <h1 class="text-xl">Shopping Cart</h1>
                        </div>
                        <table class="w-full">
                            <th class="{{-- w-4/5 --}} text-left"></th>
                            <th class="{{-- w-1/5 --}}"></th>
                            <th>Total</th>
                            <th></th>
    
                        </thead>
                            <tbody class="">
                            @foreach ($Cart as $item)
                                <tr class="sm:table-row font-semibold border-b-2 h-28">                          
                                    <td class="flex w-5/5">
                                        <div class="w-1/2 md:w-1/3 lg:w-1/5">
                                            <img class="w-20 h-auto" src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
                                        </div>
                                        <div class="w-1/2 ml-2">
                                            <h1 class="text-sm lg:text-lg">{{$item->product_name}}</h1>
                                            <h1 class="font-light text-sm">Price: <span class="font-semibold text-red-500">&dollar;{{$item->product_price}}</span></h1>    
                                        </div>
                                    </td>
                                    <td class="w-1/5 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <x-quantity-component :currentstock="$item->product_stock" :quantity="$item->product_quantity"/>
                                            <p class="text-xs sm:text-base">Quantity</p>
                                        </div>
                                    </td>
                                    <td class="w-1/5 text-center">
                                        <h1 class="font-semibold text-base sm:text-2xl"><span>&dollar;</span>{{$item->total_price}}</h1>  
                                        @php
                                            $total += $item->total_price;
                                        @endphp 
                                    </td>
                                    <td>
                                        <form action="/delete-item" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="target_item" value="{{$item->product_id}}">
                                            {{-- to make sure the product to be deleted from cart table belongs to the cureently authenticated user --}}
                                            <input type="hidden" name="user_id" value="{{$item->user_id}}">
                                            <button type="submit"><img src="{{asset('images/trash-bin.png')}}" class="h-auto w-10"></button>
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
                        <div class="w-4/5 m-auto">
                            <h1 class="text-xl">No Products at cart</h1>
                        </div>
                    @endif
                </div>
            </div>
    
        </x-layout>
    </body>
</x-root-html>