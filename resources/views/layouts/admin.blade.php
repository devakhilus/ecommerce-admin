<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - @yield('title')</title>
    <!-- ✅ Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
    <!--  Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">E-Commerce Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="{{ route('orders.index') }}">
                            Orders
                            <span id="order-count" class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle" style="display:none;">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('coupons.index') }}">Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ✅ Main Content -->
    <main class="container mt-4">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <!-- ✅ Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AJAX Polling for New Order Count -->
    <script>
        function updateOrderCount() {
            $.ajax({
                url: "{{ route('orders.newCount') }}",
                method: 'GET',
                success: function(response) {
                    const count = response.count;
                    const badge = $('#order-count');
                    badge.text(count);
                    badge.toggle(count > 0); // Show badge only if count > 0
                },
                error: function(xhr) {
                    console.error('Error fetching order count:', xhr.status, xhr.statusText);
                }
            });
        }

        // Initial call
        updateOrderCount();

        // Poll every 30 seconds
        setInterval(updateOrderCount, 30000);
    </script>
    <!-- Page-specific scripts -->
    @yield('scripts')

</body>

</html>