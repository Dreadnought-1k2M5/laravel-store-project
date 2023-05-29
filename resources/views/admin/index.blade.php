<x-root-html>
    <body>
        <div class="h-screen grid grid-cols-12">
            <div class="bg-sky-950 hidden sm:block sm:col-span-4 md:col-span-3 lg:col-span-2">
                {{-- <div class="bg-gray-900 text-white h-full w-64"> --}}
                    <x-links-dashboard />
                {{-- </div> --}}
            </div>
            <div class="col-span-12 sm:col-span-8 md:col-span-9 lg:col-span-10">
                @php
                    $target = 'adminSidebarId';
                @endphp
                <div class="bg-slate-300 flex sm:hidden justify-between items-center">
                    <x-side-btn class="bg-none" :idTarget="$target"/>
                    <div>
                        <button class="px-4 py-2 text-xs font-medium text-white bg-red-500 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">
                            Logout
                        </button>
                    </div>
                </div>

                {{-- For mobile view --}}
                <div id="mySidenav" class="sidenav top-0 sm:hidden">
                    <x-links-dashboard />
                </div>
                <div class="bg-dark sm:hidden" id="bgDarkId"></div>{{-- background when sidebar displays --}}
                
                <div class="right">
                    <div class="hidden sm:flex bg-slate-300 justify-end p-2">
                        <div>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">
                                Logout
                            </button>
                        </div>

                    </div>
                    <div class="admin-tab">
                        <div class="w-11/12 mx-auto mt-20">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                              <div class="bg-blue-100 text-sky-950 p-4 rounded-md">
                                <h2 class="text-lg font-medium">Revenue</h2>
                                <p class="text-3xl font-bold">${{$totalRevenue}}</p>
                              </div>
                              <div class="bg-blue-100 text-sky-950 p-4 rounded-md">
                                <h2 class="text-lg font-medium">Total Orders</h2>
                                <p class="text-3xl font-bold">{{$totalOrders}} orders</p>
                              </div>
                              <div class="bg-blue-100 text-sky-950 p-4 h-56 rounded-md">
                                <h2 class="text-3xl font-medium">Top selling products by order</h2>
                                <ol class="list-decimal p-4">
                                    @foreach ($topProducts as $item)
                                    <li>
                                        <p class="text-md leading-10 font-semibold">{{$item->product_name}} - (<span class="font-light">{{$item->count}} orders</span>)</p>
                                    </li>
                                    @endforeach
                                </ol>
    
                              </div>
                            </div>
                          </div>
    
                          <div class="mt-10">
                            <div>
    
                            </div>
                          </div>
                    </div>
                    <div class="admin-tab hidden">
                        <div id="displayProductId" class="mt-16">
                            <div class="py-5 px-5">
                                <button id="addProductBtnId" class="bg-blue-500 hover:bg-blue-700 text-white text-xs whitespace-nowrap font-bold py-2 px-4 rounded">
                                    Add A Product
                                </button>
                            </div>
                            <table class="min-w-full border divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Description</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Stock</th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap">Product 1</td>
                                  <td class="px-6 py-4 whitespace-nowrap">Product 1 Description</td>
                                  <td class="px-6 py-4 whitespace-nowrap">$19.99</td>
                                  <td class="px-6 py-4 whitespace-nowrap">Category 1</td>
                                  <td class="px-6 py-4 whitespace-nowrap">10</td>
                                  <td>
                                    <a href="/order/{{-- {{$order->id}} --}}" class="bg-blue-500 hover:bg-blue-700 text-white text-xs whitespace-nowrap font-bold py-2 px-4 rounded">
                                        Edit
                                      </a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap">Product 2</td>
                                  <td class="px-6 py-4 whitespace-nowrap">Product 2 Description</td>
                                  <td class="px-6 py-4 whitespace-nowrap">$29.99</td>
                                  <td class="px-6 py-4 whitespace-nowrap">Category 2</td>
                                  <td class="px-6 py-4 whitespace-nowrap">5</td>
                                  <td>
                                    <a href="/order/{{-- {{$order->id}} --}}" class="bg-blue-500 hover:bg-blue-700 text-white text-xs whitespace-nowrap font-bold py-2 px-4 rounded">
                                        View Order
                                      </a>
                                  </td>
                                </tr>
                                <!-- Add more rows as needed -->
                              </tbody>
                            </table>
                        </div>    
                          
                        <div id="productFormId" class="hidden">
                        <h1>Add product</h1>
                        <div class="">
                            <form class="max-w-lg mx-auto" action="/admin/create" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                    <input type="text" id="product_name" name="product_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('product_name')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                    <div class="mb-4">
                                    <label for="product_description" class="block text-sm font-medium text-gray-700">Product Description</label>
                                    <textarea id="product_description" name="product_description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                    @error('product_description')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                    <div class="mb-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" step="0.01" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                    <div class="mb-4">
                                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                    <input type="text" id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    
                                </div>
                                    <div class="mb-4">
                                    <label for="product_stock" class="block text-sm font-medium text-gray-700">Product Stock</label>
                                    <input type="number" id="product_stock" name="product_stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                    <div class="mb-4">
                                    <label for="product_image" class="block text-sm font-medium text-gray-700">Product Image</label>
                                    <input type="file" id="product_image" name="product_image" class="border border-gray-200 rounded p-2 w-full mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                    </button>
                                </div>
                            </form>
                        </div>
                              
                          </div>
                    </div>
                    <div class="admin-tab hidden">
                        <h1>tab 3</h1>
                    </div>
                </div>
                

            </div>
        </div>
    </body>
</x-root-html>