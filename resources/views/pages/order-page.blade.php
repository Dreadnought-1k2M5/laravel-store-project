<x-root-html>
    <body>
        <x-layout>
          <x-register/>
          <div class="w-full max-w-screen-xl mb-24 mt-10 text-sky-900 sm:py-8 sm:w-11/12 sm:mb-32 sm:mx-auto lg:mb-40">
            @if($order->count() > 0)
            @php
                $total = 0;
            @endphp
            <div class="w-full px-1 lg:w-4/5 mx-auto">
                <div class="mb-7">
                    <h1 class="text-base md:text-xl">Order made at {{$dateCreated}}</h1>
                </div>
                <table class="w-full">
                    <th class="{{-- w-4/5 --}} text-left"></th>
                    <th></th>
                    <th>Total</th>


                </thead>
                    <tbody class="">
                    @foreach ($order as $item)
                        <tr class="font-semibold border-b-2 h-28">                          
                            <td class="flex w-5/5">
{{--                                 <div class="w-1/2 md:w-1/3 lg:w-1/5">
                                    <img class="w-24 h-auto" src="{{$item->product_image ? asset('storage/' . $item->product_image) : asset('images/Product-inside.png')}}" alt="">
                                </div> --}}
                                <div class="w-1/2 ml-2">
                                    <h1 class="text-sm lg:text-lg">{{$item->product_name}}</h1>
                                    <h1 class="font-light text-sm">Price: <span class="font-semibold text-red-500">&dollar;{{$item->product_price}}</span></h1>    
                                </div>
                            </td>
                            <td class="w-1/5 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <h1>{{$item->product_quantity}} Qty.</h1>
                                    <p class="text-xs sm:text-base">Quantity</p>
                                </div>
                            </td>
                            <td class="w-1/5 text-center">
                                <h1 class="font-semibold text-base sm:text-2xl"><span>&dollar;</span>{{$item->total_price}}</h1>  
                                @php
                                    $total += $item->total_price;
                                @endphp 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="w-4/5 m-auto">
                    <h1 class="text-xl">No Products at order</h1>
                </div>
            @endif
        </x-layout>
    </body>
</x-root-html>