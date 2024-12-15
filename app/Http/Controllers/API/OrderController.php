<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with('user')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string',
            'size' => 'required|string',
            'weight' => 'required|numeric',
            'pickup_time' => 'required|date',
            'delivery_time' => 'required|date',
        ]);

        $order = Order::create(array_merge($validated, ['user_id' => auth()->id()]));

        return response()->json(['order' => $order], 201);
    }
}
