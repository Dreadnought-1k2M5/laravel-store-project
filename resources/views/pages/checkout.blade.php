<x-root-html>
    <body>
        <x-layout>
            <x-register />
            {{-- {{dd($CartContent)}} --}}
            <div class="2xl:max-w-screen-2xl sm:w-11/12 m-auto">
                    <div class="shadow-lg rounded mb-10 px-4 py-2 sm:w-3/5 m-auto">
                        @auth
                            <form action="/payment" method="POST">
                                @csrf
                                <div class="tab">
                                    <div class="m-auto py-5 border-b-2 border-sky-900 mb-7">
                                        <h1 class="text-3xl text-sky-900">Shipping Information</h1>
                                    </div>
                                    <div class="mb-4">
                                        <label for="name" class="block text-sky-900 text-sm font-bold mb-2">Recipient Full Name</label>
                                        <input required type="text" id="name" name="name" value="{{Auth()->user()->first_name . " " . Auth()->user()->last_name}}" class="w-2/4 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500">
                                        <p class="text-red-500"></p>
                                        <p id="nameError" class="text-red-500"></p>
                                    </div>
                                    <div class="mb-4">
                                        <label for="address" class="block text-sky-900 text-sm font-bold mb-2">Street Address</label>
                                        <input required type="text" id="address" name="address" placeholder="Enter Street Address" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500">
                                        <p id="addressError" class="text-red-500"></p>
                                    </div>
                                    <div class="flex flex-col mb-4 sm:items-center sm:flex-row ">
                                        <div class="w-full sm:w-2/4 mx-1">
                                            <label for="address" class="block text-sky-900 text-sm font-bold mb-2">City</label>
                                            <input required type="text" id="city" name="city" placeholder="Enter City" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500">
                                            <p id="cityError" class="text-red-500"></p>
                                        </div>
                                        <div class="w-full sm:w-2/4 mx-1 my-1">
                                            <label for="address" class="block text-sky-900 text-sm font-bold mb-2">State</label>
                                            <input required type="text" id="state" name="state" placeholder="Enter State" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500">
                                            <p id="stateError" class="text-red-500"></p>
                                        </div>
                                    </div>
    
                                    <div class="flex flex-col mb-4 sm:items-center sm:flex-row">
                                        <div class="w-full sm:w-2/4 mx-1">
                                            <label class="block text-sky-900 text-sm font-bold mb-2">Country</label>
                                            <select required name="country" id="country" class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-red-500">
                                                <option value="">Select a country</option>
                                                <option value="CA">Canada</option>
                                                <option value="FR">France</option>
                                                <option value="DE">Germany</option>
                                                <option value="IE">Ireland</option>
                                                <option value="JP">Japan</option>
                                                <option value="PH">Philippines</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                              </select>
                                              <p id="countryError" class="text-red-500"></p>
                                        </div>
                                        <div class="w-full sm:w-2/4 mx-1">
                                            <label for="phoneNumber" class="block text-sky-900 text-sm font-bold mb-2">Phone Number</label>
                                            <input required type="number" id="phone" name="phoneNumber" placeholder="Enter your phone number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500">
                                            <p id="phoneError" class="text-red-500"></p>
                                        </div>
                                    </div>
    
    
    
                                    <div class="flex flex-col sm:items-center sm:flex-row">
                                        <div class="w-2/4 mx-1">
                                            <label for="shippingMethod" class="block text-sky-900 text-sm font-bold mb-2">Shipping Method</label>
                                            <select required placeholder="TEST" id="shippingOptionId" name="shippingMethod" class="block w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-500">
                                                <option value="">Select an option</option>
                                                <option value="Standard Shipping">Standard Shipping</option>
                                                <option value="Express Shipping">Express Shipping</option>
                                                <option value="Free Shipping">Free Shipping</option>
                                            </select>
                                            <p id="shippingError" class="text-red-500"></p>
                                        </div>
    
                                        <div class="w-2/4 mx-1">
                                            <label for="zipCode" class="block text-sky-900 text-sm font-bold mb-2">Zip Code</label>
                                            <input type="number" id="zipCodeId" name="zipCode" placeholder="Enter your zip code" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-red-500">
                                            <p id="zipError" class="text-red-500"></p>
                                        </div>
                                    </div> 
                                </div>
    
                                <div class="tab hidden text-sky-900 text-sm font-bold">
                                    <div class="py-3 w-11/12 m-auto">
                                        <h1 class="text-lg">Order Summary</h1>
                                    </div>
                                    <div class="m-auto w-11/12 mb-5">
                                        <div class="py-2 border-b-2">
                                            <h1 class="text-lg">Items</h1>
                                        </div>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($CartContent as $item)
                                            <div class="w-10/12 m-auto flex justify-between py-5">
                                                <div>
                                                    <h1 class="text-base">{{$item->product_name}}</h1>
                                                    <p><span class="text-red-500">&dollar;{{$item->product_price}}</span></p>
                                                    <p class="font-normal">Quantity: {{$item->product_quantity}}</p>
    
                                                </div>
                                                <div>
                                                    <p><span class="text-red-500 text-lg">&dollar;{{$item->total_price}}</span></p>
                                                </div>
                                            </div>
                                            @php
                                                $total += $item->total_price
                                            @endphp
                                        @endforeach
    
                                        <div class="w-10/12 m-auto flex items-center justify-end my-3">
                                            <p>Total Cost:</p>
                                            <p><span class="text-red-500 text-lg ml-4">&dollar;{{$total}}</span></p>
                                        </div>
                                    </div>
                                    <div class="m-auto w-11/12 ">
                                        <div class="border-b-2 py-2">
                                            <h1 class="text-lg">Payment Option</h1>
                                        </div>
                                        <div class="flex mt-6 sm:flex-row sm:items-center w-10/12 m-auto bg-white-100">
                                            <div class="flex mb-5 sm:items-center">
                                                <input required type="radio" id="paypal" name="payment_method" value="paypal" class="form-radio h-5 w-5 text-indigo-600 mr-5">
                                            </div>
                                            <div class="flex mb-5 sm:items-center justify-between">
                                                <div>
                                                    <p>PayPal</p>
                                                    <p class="font-normal">You will be forwarded to PayPal to complete your payment</p>
                                                </div>
                                                <div class="ml-10">
                                                    <img src="{{asset('images/paypal.png')}}" alt="" class="w-24 h-auto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center w-10/12 m-auto bg-white-100">
                                            <div class="flex items-center">
                                                <input required type="radio" id="cod" name="payment_method" value="cod" class="form-radio h-5 w-5 text-indigo-600 mr-5">
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p>Cash-On-Delivery</p>
                                                    <p class="font-normal"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                                <div class="flex mt-10 items-center justify-between">
                                    <div class="">
                                        <button type="button" class="hidden rounded px-3 py-2 bg-red-400 text-white" id="backTabId">Back</button>
                                        <button type="button" class="px-3 rounded py-2 bg-red-400 text-white" id="nextTabId">Next</button>
                                    </div>
                                    <div id="checkoutBtnId" class="hidden flex justify-end">
                                        <input type="hidden" name="amount" value="{{$total}}">
                                        {{-- <input type="hidden" name="cartContent" value="{{$CartContent}}"> --}}
                                        <button type="submit" class="block rounded px-4 py-3 bg-red-500 text-white">
                                            CHECKOUT
                                        </button>
                                    </div> 
                                </div>
 
                            </form>   
                        @endauth
                    </div>
            </div>
        </x-layout>
    </body>

</x-root-html>