@extends('layouts.admin')
@section('title', 'Orders')
@section('content')
<h1>Orders</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Total</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>${{ number_format($order->total, 2) }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>
                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection