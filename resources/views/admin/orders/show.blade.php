@extends('layouts.admin')
@section('title', 'Order Details')
@section('content')
<h1>Order #{{ $order->id }}</h1>
<div class="card">
    <div class="card-body">
        <p><strong>User:</strong> {{ $order->user->name }}</p>
        <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
        <p><strong>Coupon:</strong> {{ $order->coupon ? $order->coupon->code : 'None' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <form action="{{ route('orders.update', $order) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="status" class="form-label">Update Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
</div>
<h3 class="mt-4">Products</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->pivot->quantity }}</td>
            <td>${{ number_format($product->pivot->price, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection