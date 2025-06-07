@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td id="stock-{{ $product->id }}">{{ $product->stock }}</td>
            <td>{{ $product->category->name }}</td>
            <td id="stock-{{ $product->id }}">{{ $product->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <button class="btn btn-sm btn-info update-stock" data-id="{{ $product->id }}">Update Stock</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.update-stock').on('click', function() {
            let productId = $(this).data('id');
            let stock = prompt('Enter new stock value:');
            if (stock !== null && !isNaN(stock)) {
                $.ajax({
                    url: `/admin/products/${productId}/update-stock`,
                    method: 'POST',
                    data: {
                        stock: stock,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $(`#stock-${productId}`).text(response.stock);
                        alert('Stock updated successfully!');
                    },
                    error: function() {
                        alert('Error updating stock.');
                    }
                });
            }
        });
    });
</script>
@endsection