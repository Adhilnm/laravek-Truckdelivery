<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display all submitted orders
    public function index()
    {
        // Fetch orders with associated user data
        $orders = Order::with('user')->get();

        // Return the view and pass orders
        return view('admin.orders', compact('orders'));
    }

    // Update the status of an order
    public function updateOrderStatus(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate(['status' => 'required|string']);

        // Find the order or fail
        $order = Order::findOrFail($id);

        // Update the order status
        $order->update(['status' => $validated['status']]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
