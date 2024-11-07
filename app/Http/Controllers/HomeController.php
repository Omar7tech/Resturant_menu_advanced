<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function client_index(Request $request)
    {
        $categoriesQuery = Category::with(['products' => function ($query) use ($request) {
            $query->where('enabled', true);
            if ($request->filled('s1')) {
                $query->where(str_replace("-", "_", $request->s1), true);
            }
            if ($request->filled('s2')) {
                $query->where("name", "LIKE", "%" . $request->s2 . "%");
            }
        }])
            ->orderBy("sort", "ASC")
            ->where("enabled", true); 
        $categories = $categoriesQuery->get();
        $total_products = Product::where('enabled', true)->count();
        $uncategorizedQuery = Product::whereNull("category_id")
            ->where('enabled', true);
        if ($request->filled('s1')) {
            $uncategorizedQuery->where(str_replace("-", "_", $request->s1), true);
        }
        if ($request->filled('s2')) {
            $uncategorizedQuery->where("name", "LIKE", "%" . $request->s2 . "%");
        }
        $uncategorized_products = $uncategorizedQuery->get();

        return view("welcome", compact("categories", "total_products", "uncategorized_products"));
    }





    public function admin_index(Request $request)
    {
        // Get the count of products, categories, and top sellers
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalFeaturedProducts = Product::where('featured', true)->count();
        $totalTopSellers = Product::where('top_seller', true)->count();
        $totalUnCategorized = Product::whereNull('category_id')->count();

        // Data for the chart (e.g., product counts by category)
        $productsByCategory = Category::withCount('products')->get()->map(function ($category) {
            return [
                'category' => $category->name,
                'product_count' => $category->products_count,
            ];
        });

        // Pass the data to the view
        return view("admin-welcome", compact('totalProducts', 'totalCategories', 'totalFeaturedProducts', 'totalTopSellers', 'productsByCategory' , 'totalUnCategorized'));
    }
}
