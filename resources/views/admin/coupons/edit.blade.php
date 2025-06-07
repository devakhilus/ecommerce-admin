@extends('layouts.admin')
@section('title', 'Edit Coupon')
@section('content')
<h1>Edit Coupon</h1>
<form action="{{ route('coupons.update', $coupon) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input type="text" name="code" class="form-control" value="{{ $coupon->code }}" required>
    </div>
    <div class="mb-3">
        <label for="discount" class="form-label">Discount (%)</label>
        <input type="number" name="discount" class="form-control" step="0.01" value="{{ $coupon->discount }}" required>
    </div>
    <div class="mb-3">
        <label for="expires_at" class="form-label">Expires At (optional)</label>
        <input type="date" name="expires_at" class="form-control" value="{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '' }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection