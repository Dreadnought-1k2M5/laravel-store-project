{{-- {{dd($orders)}} --}}
<x-root-html>
  <body>
      <x-layout>
        <x-register/>
          <div class="max-w-screen-xl mb-16 mt-10 sm:py-10 sm:w-11/12 sm:m-auto lg:mb-64">
            <div class="py-4">
                <h1 class="text-3xl font-semibold">Order History</h1>
            </div>
            <div class="overflow-x-auto">`
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                      <tr>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Price</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Quantity</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order->order_id}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order->product_name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order->product_price}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order->product_quantity}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order->total_price}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order->created_at}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
              
          </div>
    </x-layout>
  </body>

</x-root-html>