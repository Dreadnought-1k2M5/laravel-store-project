{{-- {{dd($orders)}} --}}
<x-root-html>
  <body>
      <x-layout>
        <x-register/>
          <div class="max-w-screen-xl mb-56 mt-10 sm:py-10 sm:w-11/12 sm:m-auto lg:mb-64">
            <div class="py-4">
                <h1 class="text-3xl font-semibold">Order History</h1>
            </div>
            <div class="sm:overflow-x-auto">`
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                      <tr>
                        <th class="px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                        <th class="px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Status</th>
                        <th class="hidden sm:table-cell px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Method</th>
                        <th class="hidden sm:table-cell px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Status</th>
                        <th class="px-4 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($orders as $order)
                        <tr>
                          <td class="px-4 py-4 text-xs sm:text-base sm:whitespace-nowrap">{{\Carbon\Carbon::parse($order->created_at)->format('F d, Y (H:i:s)');}}</td>
                          <td class="px-4 py-4 text-xs sm:text-base sm:whitespace-nowrap">{{$order->payment_status}}</td>

                          <td class="px-4 py-4 sm:whitespace-nowrap hidden text-xs sm:text-base sm:table-cell ">{{$order->payment_method}}</td>
                          <td class="px-4 py-4 sm:whitespace-nowrap hidden text-xs sm:text-base sm:table-cell ">{{$order->order_status}}</td>
                          <td class="px-4 py-4 " >
                            <a href="/order/{{$order->id}}" class="bg-blue-500 hover:bg-blue-700 text-white text-xs whitespace-nowrap font-bold py-2 px-4 rounded">
                              View Order
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
              
          </div>
    </x-layout>
  </body>

</x-root-html>