@extends('layouts.admin')
@section('title', 'Coupons')
@section('content')
<h1>Coupons</h1>
<a href="{{ route('coupons.create') }}" class="btn btn-primary mb-3">Add Coupon</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Discount (%)</th>
            <th>Expires At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coupons as $coupon)
        <tr>
            <td>{{ $coupon->id }}</td>
            <td>{{ $coupon->code }}</td>
            <td>{{ $coupon->discount }}</td>
            <td>{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : 'N/A' }}</td>
            <td>
                <a href="{{ route('coupons.edit', $coupon) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('coupons.destroy', $coupon) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $coupons->links() }}
@endsection