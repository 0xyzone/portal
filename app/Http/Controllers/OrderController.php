<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Company;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\StoreOrderItemsRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $orders = Order::paginate(10, ['*'], 'orders');
        $companyId = $company->id;
        return view('orders.index', compact('company', 'orders', 'companyId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $orders = Order::paginate(10, ['*'], 'orders');
        $companyId = $company->id;
        return view('orders.create', compact('company', 'orders', 'companyId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, $company)
    {
        $formFields = $request->validated();
        $formFields['company_id'] = $company;
        Order::create($formFields);
        $order = Order::latest()->first();
        $orderID = $order->id;

        return redirect(route('order.create.items', ['company' => $company, 'order' => $orderID]));
    }

    public function create_order_items(Company $company, Order $order)
    {
        $companyId = $company->id;
        $orderId = $order->id;
        return view('orders.addItems', compact('company', 'order', 'companyId', 'orderId'));
        
    }

    public function store_order_items(StoreOrderItemsRequest $request)
    {
        $formFields = $request->validated();
        Order::create($formFields);
        
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
