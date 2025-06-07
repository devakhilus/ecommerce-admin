@extends('layouts.admin')
@section('title', 'Create Coupon')
@section('content')
<h1>Create Coupon</h1>
<form action="{{ route('coupons.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input type="text" name="code" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="discount" class="form-label">Discount (%)</label>
        <input type="number" name="discount" class="form-control" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="expires_at" class="form-label">Expires At (optional)</label>
        <input type="date" name="expires_at" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection