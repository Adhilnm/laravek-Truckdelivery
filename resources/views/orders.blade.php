@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow-md">
    <h1 class="text-2xl font-bold mb-4">Manage Orders</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border px-4 py-2">Order ID</th>
                <th class="border px-4 py-2">User Name</th>
                <th class="border px-4 py-2">Location</th>
                <th class="border px-4 py-2">Weight</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($orders->isEmpty())
                <!-- Show a message if no orders are available -->
                <tr>
                    <td colspan="6" class="border px-4 py-2 text-center text-gray-500">No orders found.</td>
                </tr>
            @else
                <!-- Loop through orders and display them -->
                @foreach ($orders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->user->name }}</td>
                        <td class="border px-4 py-2">{{ $order->location }}</td>
                        <td class="border px-4 py-2">{{ $order->weight }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($order->status) }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="border px-2 py-1">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in progress" {{ $order->status === 'in progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
