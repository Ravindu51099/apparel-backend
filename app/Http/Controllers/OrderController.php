<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'material_type' => 'required',
            'quantity' => 'required',
            'print_available' => 'required',
            'required_size' => 'required',
            'status' => 'sometimes|required',
        ]);
        return Order::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return $order;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'sometimes|required',
            'material_type' => 'sometimes|required',
            'quantity' => 'sometimes|required',
            'print_available' => 'sometimes|required',
            'required_size' => 'sometimes|required',
            'status' => 'sometimes|required',
        ]);

        return $order->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        return $order->delete();
    }
}
