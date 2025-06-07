<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->take(5)->get();
        $lowStockProducts = Product::where('stock', '<', 10)->get();

        $productsCount = Product::count();
        $ordersCount = Order::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact(
            'orders',
            'lowStockProducts',
            'productsCount',
            'ordersCount',
            'categoriesCount',
            'usersCount'
        ));
    }
}
