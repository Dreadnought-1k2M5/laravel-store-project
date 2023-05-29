<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItems;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreOrderItemsRequest;
use App\Http\Requests\UpdateOrderItemsRequest;
use App\Models\Products;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderItemsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItems $orderItems, $orderId)
    {

        $date = Order::where('id', $orderId)->get('created_at');
        $formattedTimestamp = Carbon::parse($date[0]->created_at)->format('F d, Y (H:i:s)');
        $order = $orderItems->where('order_id', $orderId)->paginate(4);
/*         $product = $orderItems->where('order_id', $orderId)->select('product_id')->get();
        dd($product);
        
        $productImage = Products::where('id', $product[0]->product_id)->select('product_image')->get();
        dd($productImage[0]->product_image); */

        return view('pages.order-page', ['order' => $order, 'dateCreated' => $formattedTimestamp]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItems $orderItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderItemsRequest $request, OrderItems $orderItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItems $orderItems)
    {
        //
    }
}
