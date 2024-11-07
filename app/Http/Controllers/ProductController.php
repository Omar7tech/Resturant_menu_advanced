<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->input("category");
        $paginate = $request->input("paginate");
        $search = $request->input("search");

        // Initialize the base query for products
        $productsQuery = Product::query();

        // Apply filters based on query parameters
        if ($request->has('new') && $request->input('new') === 'on') {
            // Show only new products
            $productsQuery->where('new', true);
        } elseif ($request->has('no_category') && $request->input('no_category') === 'on') {
            // Show products with no category
            $productsQuery->whereNull('category_id');
        } elseif ($category) {
            // Filter by specific category
            $productsQuery->where('category_id', $category);
        }

        // Apply search filter if provided
        if ($search) {
            $productsQuery->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // Handle pagination based on 'all' parameter
        if ($request->has("all") && $request->input("all") === "on") {
            $products = $productsQuery->paginate(100);
        } else {
            $products = $productsQuery->paginate($paginate ?? 15);
        }

        // Retrieve all categories for the dropdown/filter options
        $categories = Category::all();

        return view("products.index", compact("products", "categories", "category", "search"));
    }


    public function toggleEnabled(Product $product, Request $request)
    {
        $product->enabled = $request->input('enabled');
        $product->save();

        return response()->json(['success' => true]);
    }

    public function toggleFeatured(Product $product, Request $request)
    {
        $product->featured = $request->input('featured');
        $product->save();

        return response()->json(['success' => true]);
    }

    public function updateCategory(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->category_id = $validatedData['category_id'];
        $product->save();

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    // Handle the form submission to store a new product
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'new_price' => 'nullable|numeric|min:0',
            'preparation_time' => 'nullable|integer|min:0',
            'calories' => 'nullable|integer|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->new_price = $validatedData['new_price'];
        $product->preparation_time = $validatedData['preparation_time'];
        $product->calories = $validatedData['calories'];
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('images/products', 'public');
            $product->image_url = '/storage/' . $path;
        }

        // Set the boolean fields based on checkboxes
        $product->available = $request->has('available');
        $product->enabled = $request->has('enabled');
        $product->new = $request->has('new');
        $product->top_seller = $request->has('top_seller');
        $product->featured = $request->has('featured');
        $product->spicy = $request->has('spicy');
        $product->vegan = $request->has('vegan');
        $product->dairy_free = $request->has('dairy_free');

        // Save the product to the database
        $product->save();

        // Redirect back to the product list or a success page
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'new_price' => 'nullable|numeric|min:0',
            'preparation_time' => 'nullable|integer|min:0',
            'calories' => 'nullable|integer|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update product details
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->preparation_time = $request->preparation_time;
        $product->calories = $request->calories;

        // Handle image upload and delete old image if a new one is uploaded

        if ($request->hasFile('image_url')) {
            // Check if there is an old image and delete it
            if ($product->image_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image_url))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_url));
            }

            // Store the new image and set the new path
            $path = $request->file('image_url')->store('images/products', 'public');
            $product->image_url = '/storage/' . $path;
        }

        // Update checkbox fields
        $product->available = $request->has('available') && $request->input('available') === 'on';
        $product->enabled = $request->has('enabled') && $request->input('enabled') === 'on';
        $product->new = $request->has('new') && $request->input('new') === 'on';
        $product->top_seller = $request->has('top_seller') && $request->input('top_seller') === 'on';
        $product->featured = $request->has('featured') && $request->input('featured') === 'on';
        $product->spicy = $request->has('spicy') && $request->input('spicy') === 'on';
        $product->vegan = $request->has('vegan') && $request->input('vegan') === 'on';
        $product->dairy_free = $request->has('dairy_free') && $request->input('dairy_free') === 'on';

        // Save the product changes
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Check if the product has an image
        if ($product->image_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image_url))) {
            // Delete the old image from the storage
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_url));
        }

        // Delete the product from the database
        $product->delete();

        // Redirect back with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    public function delete_image(Product $product)
    {
        if ($product->image_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image_url))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_url));
        }

        $product->image_url = null;
        $product->save();
        return redirect()->back();
    }
}
