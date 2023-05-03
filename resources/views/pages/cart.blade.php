<x-root-html>
    <x-layout>
        <x-register />
        <div>
            <div class="2xl:max-w-screen-2xl sm:w-11/12 m-auto grid sm:grid-cols-4 sm:grid-rows-2 ">
                <div class="sm:rows-span-2 sm:col-start-1 sm:col-end-4 overflow-x">
                    <table class="w-full text-left ">
                        <thead>
                          <tr  class="{{-- bg-red-200 --}}">
                            <th></th>
                            <th></th>
                            <th>Price</th>
                            <th>Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($Cart as $item)
                            <tr>
                                <td class="bg-red-100 sm:w-20">
                                    <img class="w-full max-w-xs h-auto" src="{{/* $product->product_image ? asset('storage/' . $product->product_image) :  */asset('images/Product-inside.png')}}" alt="">
                                </td>
                                <td class="sm:w-50">
                                    <h1>{{$item->product_name}}</h1>   
                                </td>
                                <td >
                                    <h1>{{$item->product_price}}</h1>   
                                </td>
                                <td>
                                    <h1>{{$item->product_quantity}}</h1>   
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>
                <div class="rows-span-1 sm:col-start-4 sm:col-end-5 {{-- bg-green-100 --}}">
                    chyeckout box
                </div>
            </div>
        </div>
    </x-layout>
</x-root-html>